# Timestamp
## Represents a date and time as a value object

_Copyright (c) 2007-2012 Will Bond, others_.
_Please see the LICENSE file at the root of this distribution_

#### Namespace

`Dotink\Flourish`

#### Authors

<table>
	<thead>
		<th>Name</th>
		<th>Handle</th>
		<th>Email</th>
	</thead>
	<tbody>
	
		<tr>
			<td>
				Will Bond
			</td>
			<td>
				wb
			</td>
			<td>
				will@flourishlib.com
			</td>
		</tr>
	
		<tr>
			<td>
				Matthew J. Sahagian
			</td>
			<td>
				mjs
			</td>
			<td>
				msahagian@dotink.org
			</td>
		</tr>
	
	</tbody>
</table>

## Properties
### Static Properties
#### <span style="color:#6a6e3d;">$formats</span>

Pre-defined formatting styles

#### <span style="color:#6a6e3d;">$format_callback</span>

A callback to process all formatting strings through

#### <span style="color:#6a6e3d;">$unformat_callback</span>

A callback to parse all date string to allow for locale-specific parsing



### Instance Properties
#### <span style="color:#6a6e3d;">$timestamp</span>

The date/time

#### <span style="color:#6a6e3d;">$timezone</span>

The timezone for this date/time




## Methods
### Static Methods
<hr />

#### <span style="color:#3e6a6e;">callFormatCallback()</span>

If a format callback is defined, call it.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$formatted_string
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The formatted date/time/timestamp string to be modified
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The (possibly) modified formatted string
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">callUnformatCallback()</span>

If an unformat callback is defined, call it.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$date_time_string
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				A raw date/time/timestamp string to be parsed/modified
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The (possibly) parsed or modified date/time/timestamp
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">defineFormat()</span>

Creates a reusable format for formatting Date, Time, Timestamp objects.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$name
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The name of the format
			</td>
		</tr>
					
		<tr>
			<td>
				$formatting_string
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The format string compatible with PHP's date() function
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">fixISOWeek()</span>

Fixes an ISO week format into `'Y-m-d'` so PHP's strtotime() function will accept it.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$date
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The date to fix
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The fixed date
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">getDefaultTimezone()</span>

Provides a consistent interface to getting the default timezone.

##### Details

This wraps PHP's date_default_timezone_get() function.

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The default timezone used for all date/time calculations
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">isValidTimezone()</span>

Checks to see if a timezone is valid.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$timezone
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The timezone to check
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If the timezone is valid
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">registerFormatCallback()</span>

Allows setting a callback to translate or modify return values of ::format()

##### Details

This callback is used for all date related classes with a ::format() method.  The
callback should accept a string and return a string.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$callback
			</td>
			<td>
									callback				
			</td>
			<td>
				The callback to pass all formatted calls through
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">registerUnformatCallback()</span>

Allows setting a callback to parse any date strings passed into ::__construct()

##### Details

This callback is used for all date related classes and their ::__construct() method.
The callback should accept a single string and return a single string that is parseable
by PHP's strtotime() function.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$callback
			</td>
			<td>
									callback				
			</td>
			<td>
				The callback to pass all date strings through
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">reset()</span>

Resets the configuration of the class

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">setDefaultTimezone()</span>

Provides a consistent interface to setting the default timezone.

##### Details

This wraps PHP's date_default_timezone_get() function.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$timezone
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The default timezone to use for all date/time calculations
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">translateFormat()</span>

Takes a format name set via ::defineFormat() and returns the [http://php.net/date date()] function formatting string

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$format
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The format to translate
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The formatting string. If no matching format was found, this will be the same as the `$format` parameter.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">compose()</span>

Composes text using Text class if loaded.

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$message
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The message to compose
			</td>
		</tr>
					
		<tr>
			<td>
				$component
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				A string or number to insert into the message
			</td>
		</tr>
					
		<tr>
			<td>
				...
			</td>
			<td>
									<a href="http://www.php.net/language.pseudo-types.php">mixed</a>
				
			</td>
			<td>
				
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The composed and possible translated message
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">checkPHPVersion()</span>

Checks to make sure the current version of PHP is high enough to support timezones

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>




### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates the date/time to represent

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$datetime
			</td>
			<td>
									<a href="./">Timestamp</a>
				
			</td>
			<td rowspan="5">
				The date/time to represent, `NULL` is interpreted as now
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
								
		<tr>
			<td>
				$timezone
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The timezone for the date/time. This causes the date/time to be interpretted as being in the specified timezone. If not specified, will default to timezone set by ::setDefaultTimezone().
			</td>
		</tr>
			
	</tbody>
</table>

###### Throws

<dl>

	<dt>
					Dotink\Flourish\ValidationException		
	</dt>
	<dd>
		When `$datetime` is not a valid date/time, date or time value
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">__get()</span>

All requests that hit this method should be requests for callbacks

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$method
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The method to create a callback for
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			callback
		</dt>
		<dd>
			The callback for the method requested
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">__toString()</span>

Returns this date/time

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The `'Y-m-d H:i:s'` format of this date/time
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">adjust()</span>

Changes the date/time by the adjustment specified

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$adjustment
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The adjustment to make - may be a relative adjustment or a different timezone
			</td>
		</tr>
			
	</tbody>
</table>

###### Throws

<dl>

	<dt>
					Dotink\Flourish\fValidationException		
	</dt>
	<dd>
		When `$adjustment` is not a valid relative date/time measurement or timezone
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			fTimestamp
		</dt>
		<dd>
			The adjusted date/time
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">eq()</span>

If this timestamp is equal to the timestamp passed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$other_timestamp
			</td>
			<td>
									fTimestamp				
			</td>
			<td rowspan="5">
				The timestamp to compare with, `NULL` is interpreted as today
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
						
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If this timestamp is equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">format()</span>

Formats the date/time

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$format
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The [http://php.net/date date()] function compatible formatting string, or a format name from ::defineFormat()
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The formatted date/time
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">getFuzzyDifference()</span>

Returns the approximate difference in time, discarding any unit of measure but the least specific.

##### Details

The output will read like:

- "This timestamp is `{return value}` the provided one" when a timestamp it passed
- "This timestamp is `{return value}`" when no timestamp is passed and comparing with the current timestamp

Examples of output for a timestamp passed might be:

- `'5 minutes after'`
- `'2 hours before'`
- `'2 days after'`
- `'at the same time'`

Examples of output for no timestamp passed might be:

- `'5 minutes ago'`
- `'2 hours ago'`
- `'2 days from now'`
- `'1 year ago'`
- `'right now'`

You would never get the following output since it includes more than one unit of time measurement:

- `'5 minutes and 28 seconds'`
- `'3 weeks, 1 day and 4 hours'`

Values that are close to the next largest unit of measure will be rounded up:

- `'55 minutes'` would be represented as `'1 hour'`, however `'45 minutes'` would not
- `'29 days'` would be represented as `'1 month'`, but `'21 days'` would be shown as `'3 weeks'`

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="4">
				$other_timestamp
			</td>
			<td>
									<a href="./">Timestamp</a>
				
			</td>
			<td rowspan="4">
				The timestamp to create the difference with, `NULL` is interpreted as now
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
								
		<tr>
			<td>
				$simple
			</td>
			<td>
									<a href="http://www.php.net/language.types.boolean.php">boolean</a>
				
			</td>
			<td>
				When `TRUE`, the returned value will only include the difference in the two timestamps, but not `from now`, `ago`, `after` or `before`
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The fuzzy difference in time between the this timestamp and the one provided
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">gt()</span>

If this timestamp is greater than the timestamp passed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$other_timestamp
			</td>
			<td>
									fTimestamp				
			</td>
			<td rowspan="5">
				The timestamp to compare with, `NULL` is interpreted as now
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
						
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If this timestamp is greater than the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">gte()</span>

If this timestamp is greater than or equal to the timestamp passed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$other_timestamp
			</td>
			<td>
									fTimestamp				
			</td>
			<td rowspan="5">
				The timestamp to compare with, `NULL` is interpreted as now
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
						
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If this timestamp is greater than or equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lt()</span>

If this timestamp is less than the timestamp passed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$other_timestamp
			</td>
			<td>
									fTimestamp				
			</td>
			<td rowspan="5">
				The timestamp to compare with, `NULL` is interpreted as today
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
						
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If this timestamp is less than the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lte()</span>

If this timestamp is less than or equal to the timestamp passed

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td rowspan="5">
				$other_timestamp
			</td>
			<td>
									fTimestamp				
			</td>
			<td rowspan="5">
				The timestamp to compare with, `NULL` is interpreted as today
			</td>
		</tr>
			
		<tr>
			<td>
									object				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
		</tr>
			
		<tr>
			<td>
									<a href="http://www.php.net/language.types.integer.php">integer</a>
				
			</td>
		</tr>
						
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			If this timestamp is less than or equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">modify()</span>

Modifies the current timestamp, creating a new fTimestamp object

##### Details

The purpose of this method is to allow for easy creation of a timestamp
based on this timestamp. Below are some examples of formats to
modify the current timestamp:

- `'Y-m-01 H:i:s'` to change the date of the timestamp to the first of the month:
- `'Y-m-t H:i:s'` to change the date of the timestamp to the last of the month:
- `'Y-m-d 17:i:s'` to set the hour of the timestamp to 5 PM:

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$format
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The current timestamp will be formatted with this string, and the output used to create a new object. The format should **not** include the timezone (character `e`).
			</td>
		</tr>
					
		<tr>
			<td>
				$timezone
			</td>
			<td>
									<a href="http://www.php.net/language.types.string.php">string</a>
				
			</td>
			<td>
				The timezone for the new object if different from the current timezone
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			fTimestamp
		</dt>
		<dd>
			The new timestamp
		</dd>
	
</dl>






