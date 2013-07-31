# Date
## Represents a date as a value object

_Copyright (c) 2008-2011 Will Bond, others_.
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
#### <span style="color:#6a6e3d;">$currentKeywords</span>

A list of keywords which describe a "current" date.



### Instance Properties
#### <span style="color:#6a6e3d;">$date</span>

A timestamp of the date




## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Creates the date to represent, no timezone is allowed since dates don't have timezones

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
				$date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to represent
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

###### Throws

<dl>

	<dt>
					Dotink\Flourish\ValidationException		
	</dt>
	<dd>
		When `$date` is not a valid date
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

Returns this date in `Y-m-d` format

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The `Y-m-d` format of this date
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">adjust()</span>

Changes the date by the adjustment specified, only adjustments of a day or more will be
made

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
				The adjustment to make
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
		When `$adjustment` is not a relative date measurement
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			fDate
		</dt>
		<dd>
			The adjusted date
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">eq()</span>

If this date is equal to the date passed

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to compare with
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
			If this date is equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">format()</span>

Formats the date

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
				The `date()` compatible formatting string or defined format
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
		When a non-date formatting character is included in `$format`
	</dd>

</dl>

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The formatted date
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">getFuzzyDifference()</span>

Returns the approximate difference in time, discarding any unit of measure but the least
specific.

##### Details

The output will read like:

- "This date is `{return value}` the provided one" when a date it passed
- "This date is `{return value}`" when no date is passed and comparing with today

Examples of output for a date passed might be:

- `'2 days after'`
- `'1 year before'`
- `'same day'`

Examples of output for no date passed might be:

- `'2 days from now'`
- `'1 year ago'`
- `'today'`

You would never get the following output since it includes more than one unit of time
measurement:

- `'3 weeks and 1 day'`
- `'1 year and 2 months'`

Values that are close to the next largest unit of measure will be rounded up:

- `6 days` would be represented as `1 week`; `5 days` would not
- `29 days` would be represented as `1 month`; `21 days` would be shown as `3 weeks`

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to create the difference with
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
				$simple
			</td>
			<td>
									<a href="http://www.php.net/language.types.boolean.php">boolean</a>
				
			</td>
			<td>
				When `TRUE` removes added phrasing such as `from now`, `ago`, etc
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
			The fuzzy difference in time between the this date and the one provided
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">gt()</span>

If this date is greater than the date passed

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to compare with
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
			If this date is greater than the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">gte()</span>

If this date is greater than or equal to the date passed

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to compare with
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
			If this date is greater than or equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lt()</span>

If this date is less than the date passed

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to compare with
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
			If this date is less than the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">lte()</span>

If this date is less than or equal to the date passed

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
				$other_date
			</td>
			<td>
									<a href="./">Date</a>
				
			</td>
			<td rowspan="5">
				The date to compare with
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
			If this date is less than or equal to the one passed
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">modify()</span>

Modifies the current date, creating a new Date object

##### Details

The purpose of this method is to allow for easy creation of a date based on this date.
Below are some examples of formats to modify the current date:

- `'Y-m-01'`  to change the date to the first of the month
- `'Y-m-t'`   to change the date to the last of the month
- `'Y-\W5-N'` to change the date to the 5th week of the year

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
				The format according to which to modify the date
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			Date
		</dt>
		<dd>
			The new date
		</dd>
	
</dl>






