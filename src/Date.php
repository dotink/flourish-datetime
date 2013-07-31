<?php namespace Dotink\Flourish {

	/**
	 * Represents a date as a value object
	 *
	 * @copyright  Copyright (c) 2008-2011 Will Bond, others
	 * @author     Will Bond [wb] <will@flourishlib.com>
	 * @author     Matthew J. Sahagian [mjs] <msahagian@dotink.org>
	 *
	 * @license    Please see the LICENSE file at the root of this distribution
	 *
	 * @package    Flourish
	 *
	 * Static Dependencies:
	 * - Core
	 *
	 */

	class Date
	{
		/**
		 * A list of keywords which describe a "current" date.
		 *
		 * @var array
		 */
		private static $currentKeywords = ['CURRENT_TIMESTAMP', 'CURRENT_DATE'];


		/**
		 * A timestamp of the date
		 *
		 * @var integer
		 */
		protected $date;


		/**
		 * Creates the date to represent, no timezone is allowed since dates don't have timezones
		 *
		 * @throws ValidationException When `$date` is not a valid date
		 *
		 * @param  Date|object|string|integer $date  The date to represent
		 * @return void
		 */
		public function __construct($date = NULL)
		{
			if ($date === NULL) {
				$timestamp = time();
			} elseif (is_numeric($date) && preg_match('#^-?\d+$#D', $date)) {
				$timestamp = (int) $date;
			} elseif (is_string($date) && in_array(strtoupper($date), self::$currentKeywords)) {
				$timestamp = time();
			} else {
				if (is_object($date) && is_callable([$date, '__toString'])) {
					$date = $date->__toString();
				} elseif (is_numeric($date) || is_object($date)) {
					$date = (string) $date;
				}

				$date      = Timestamp::callUnformatCallback($date);
				$timestamp = strtotime(Timestamp::fixISOWeek($date));
			}

			if ($timestamp === FALSE) {
				throw new ValidationException(
					'The date specified, %s, does not appear to be a valid date',
					$date
				);
			}

			$this->date = strtotime(date('Y-m-d 00:00:00', $timestamp));
		}


		/**
		 * All requests that hit this method should be requests for callbacks
		 *
		 * @internal
		 *
		 * @param  string $method  The method to create a callback for
		 * @return callback  The callback for the method requested
		 */
		public function __get($method)
		{
			return array($this, $method);
		}


		/**
		 * Returns this date in `Y-m-d` format
		 *
		 * @return string  The `Y-m-d` format of this date
		 */
		public function __toString()
		{
			return date('Y-m-d', $this->date);
		}


		/**
		 * Changes the date by the adjustment specified, only adjustments of a day or more will be
		 * made
		 *
		 * @throws fValidationException  When `$adjustment` is not a relative date measurement
		 *
		 * @param  string $adjustment  The adjustment to make
		 * @return fDate  The adjusted date
		 */
		public function adjust($adjustment)
		{
			$timestamp = strtotime($adjustment, $this->date);

			if ($timestamp === FALSE || $timestamp === -1) {
				throw new ValidationException(
					'The adjustment specified, %s, does not appear to be a valid relative date ' .
					'measurement',
					$adjustment
				);
			}

			return new self($timestamp);
		}


		/**
		 * If this date is equal to the date passed
		 *
		 * @param Date|object|string|integer $other_date The date to compare with
		 * @return boolean If this date is equal to the one passed
		 */
		public function eq($other_date = NULL)
		{
			$other_date = new self($other_date);
			return $this->date == $other_date->date;
		}


		/**
		 * Formats the date
		 *
		 * @throws ValidationException When a non-date formatting character is included in `$format`
		 *
		 * @param string $format The `date()` compatible formatting string or defined format
		 * @return string The formatted date
		 */
		public function format($format)
		{
			$format             = Timestamp::translateFormat($format);
			$restricted_formats = 'aABcegGhHiIOPrsTuUZ';

			if (preg_match('#(?!\\\\).[' . $restricted_formats . ']#', $format)) {
				throw new ProgrammerException(
					'The formatting string, %1$s, contains one of the following non-date ' .
					'formatting characters: %2$s',
					$format,
					join(', ', str_split($restricted_formats))
				);
			}

			return Timestamp::callFormatCallback(date($format, $this->date));
		}


		/**
		 * Returns the approximate difference in time, discarding any unit of measure but the least
		 * specific.
		 *
		 * The output will read like:
		 *
		 *  - "This date is `{return value}` the provided one" when a date it passed
		 *  - "This date is `{return value}`" when no date is passed and comparing with today
		 *
		 * Examples of output for a date passed might be:
		 *
		 *  - `'2 days after'`
		 *  - `'1 year before'`
		 *  - `'same day'`
		 *
		 * Examples of output for no date passed might be:
		 *
		 *  - `'2 days from now'`
		 *  - `'1 year ago'`
		 *  - `'today'`
		 *
		 * You would never get the following output since it includes more than one unit of time
		 * measurement:
		 *
		 *  - `'3 weeks and 1 day'`
		 *  - `'1 year and 2 months'`
		 *
		 * Values that are close to the next largest unit of measure will be rounded up:
		 *
		 *  - `6 days` would be represented as `1 week`; `5 days` would not
		 *  - `29 days` would be represented as `1 month`; `21 days` would be shown as `3 weeks`
		 *
		 * @param Date|object|string|integer $other_date The date to create the difference with
		 * @param boolean $simple When `TRUE` removes added phrasing such as `from now`, `ago`, etc
		 * @return string The fuzzy difference in time between the this date and the one provided
		 */
		public function getFuzzyDifference($other_date = NULL, $simple = FALSE)
		{
			if (is_bool($other_date)) {
				$simple     = $other_date;
				$other_date = NULL;
			}

			$relative_to_now = FALSE;

			if ($other_date === NULL) {
				$relative_to_now = TRUE;
			}

			$other_date = new self($other_date);
			$diff       = $this->date - $other_date->date;

			if (abs($diff) < 86400) {
				if ($relative_to_now) {
					return Core::compose('today');
				}

				return Core::compose('same day');
			}

			$break_points = [

				//
				// 5 days
				// 3 weeks
				// 9 months
				// largest int
				//

				432000     => [86400,    Core::compose('day'),   Core::compose('days')],
				1814400    => [604800,   Core::compose('week'),  Core::compose('weeks')],
				23328000   => [2592000,  Core::compose('month'), Core::compose('months')],
				2147483647 => [31536000, Core::compose('year'),  Core::compose('years')]
			];

			foreach ($break_points as $break_point => $unit_info) {
				if (abs($diff) > $break_point) {
					continue;
				}

				$unit_diff = round(abs($diff)/$unit_info[0]);
				$units     = $unit_diff > 1
					? $unit_info[2]
					: $unit_info[1];

				break;
			}

			if ($simple) {
				return Core::compose('%1$s %2$s', $unit_diff, $units);
			}

			if ($relative_to_now) {
				if ($diff > 0) {
					return Core::compose('%1$s %2$s from now', $unit_diff, $units);
				}

				return Core::compose('%1$s %2$s ago', $unit_diff, $units);
			}

			if ($diff > 0) {
				return Core::compose('%1$s %2$s after', $unit_diff, $units);
			}

			return Core::compose('%1$s %2$s before', $unit_diff, $units);
		}


		/**
		 * If this date is greater than the date passed
		 *
		 * @param Date|object|string|integer $other_date The date to compare with
		 * @return boolean If this date is greater than the one passed
		 */
		public function gt($other_date=NULL)
		{
			$other_date = new self($other_date);
			return $this->date > $other_date->date;
		}


		/**
		 * If this date is greater than or equal to the date passed
		 *
		 * @param Date|object|string|integer $other_date The date to compare with
		 * @return boolean If this date is greater than or equal to the one passed
		 */
		public function gte($other_date=NULL)
		{
			$other_date = new self($other_date);
			return $this->date >= $other_date->date;
		}


		/**
		 * If this date is less than the date passed
		 *
		 * @param Date|object|string|integer $other_date The date to compare with
		 * @return boolean If this date is less than the one passed
		 */
		public function lt($other_date = NULL)
		{
			$other_date = new self($other_date);
			return $this->date < $other_date->date;
		}


		/**
		 * If this date is less than or equal to the date passed
		 *
		 * @param Date|object|string|integer $other_date The date to compare with
		 * @return boolean If this date is less than or equal to the one passed
		 */
		public function lte($other_date = NULL)
		{
			$other_date = new self($other_date);
			return $this->date <= $other_date->date;
		}


		/**
		 * Modifies the current date, creating a new Date object
		 *
		 * The purpose of this method is to allow for easy creation of a date based on this date.
		 * Below are some examples of formats to modify the current date:
		 *
		 *  - `'Y-m-01'`  to change the date to the first of the month
		 *  - `'Y-m-t'`   to change the date to the last of the month
		 *  - `'Y-\W5-N'` to change the date to the 5th week of the year
		 *
		 * @param string $format The format according to which to modify the date
		 * @return Date The new date
		 */
		public function modify($format)
		{
		   return new self($this->format($format));
		}
	}
}
