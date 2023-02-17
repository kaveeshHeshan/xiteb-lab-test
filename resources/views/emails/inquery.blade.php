@component('mail::message')
# {{__('You have a new inquery.')}}
{{__('It seems like a customer has something to ask regarding the product called')}} {{$productname}}{{__('.')}}
{{__('Please have your attension on this.')}}

|                                   |              |Desscription          | 
| --------------------------------- |:------------:|:---------------------|
| {{__('User Name : ')}}            |              | {{$username}}        |
| {{__('Email : ')}}                |              | {{$email}}           |
| {{__('Question : ')}}             |              | {{$question}}        |
| {{__('Contact Number : ')}}       |              | {{$contact_number}}  |

<br/>
<br/>
{{ __('Thank you,') }}<br>
{{ __('Xiteb Lab Test Team.') }}

@endcomponent
