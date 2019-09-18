@component('mail::message')
# Estimado Goffredo:

Un usuario está interesado en la publicación "{{ $property->title }}" con id {{ $property->id }}. El link de la publicación es: {{ url('/properties/'.$property->id) }}. Los datos de contacto que el usuario ingresó son:

- Nombre: {{ $data['first_name'] }}
- Apellido: {{ $data['last_name'] }}
- Email: {{ $data['email'] }}
- Teléfono: {{ $data['phone'] }}
- Fecha de Nacimiento: {{ $data['birth_date'] }}
- RFC: {{ $data['rfc'] }}

Los datos de contacto del dueño de la publicación son:
- Nombre completo: {{ $property->user->name ?: 'No disponible' }}
- Email: {{ $property->user->email ?: 'No disponible' }}
- Teléfono móvil: {{ $property->user->mobile ?: 'No disponible' }}
- Teléfono fijo: {{ $property->user->phone ?: 'No disponible' }}
- Teléfono alternativo: {{ $property->user->fax ?: 'No disponible' }}

Saludos.

@endcomponent
