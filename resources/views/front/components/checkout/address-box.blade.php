<div class="one-third-seperate"></div>
{{ $address->full_name ? 'نام : ' . $address->full_name : ''}} - 
{{ $address->phone ? 'شماره همراه: ' . $address->phone : ''}} -
{{ $address->telephone ? 'شماره ثابت: ' . $address->telephone : ''}}
<div class="one-third-seperate"></div>
{{ $address->province ? ' استان: ' . 
\Config::get('constants.provinces')[$address->province] : ''}}
- 
{{ $address->city ? ' شهر: ' . $address->city : ''}}
{{ $address->postal_code ? 'کدپستی‌: ' . $address->postal_code : ''}}
<div class="one-third-seperate"></div>
{{ $address->address ? 'آدرس: '.$address->address : ''}}
<hr>