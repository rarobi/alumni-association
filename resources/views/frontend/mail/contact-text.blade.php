@lang('strings.emails.contact.email_body_title')

@lang('validation.attributes.frontend.name'): {{ $user['name'] }}
@lang('validation.attributes.frontend.email'): {{ $user['email'] }}
@lang('validation.attributes.frontend.phone'): {{ $user['mobile'] ? $user['mobile'] : 'N/A' }}
