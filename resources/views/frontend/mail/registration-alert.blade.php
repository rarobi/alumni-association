@lang('strings.emails.register.email_body_title')
{{--{!! dd($user) !!}--}}
@lang('validation.attributes.frontend.name'): {{ $user['name'] }}
@lang('validation.attributes.frontend.email'): {{ $user['email'] }}
@lang('validation.attributes.frontend.phone'): {{ $user['mobile'] ? $user['mobile'] : 'N/A' }}
{{--@lang('validation.attributes.frontend.message'): {{ $user->message }}--}}