@component('mail::message')
# Estimado Goffredo:

El usuario {{ $user->name }} publicó un inmueble titulado "{{ $property->title }}" con id {{ $property->id }}. Los datos del usuario son los siguientes:

Los datos del usuario son:
- Nombre completo: {{ $user->name ?: 'No disponible' }}
- Email: {{ $user->email ?: 'No disponible' }}
- Teléfono móvil: {{ $user->mobile ?: 'No disponible' }}
- Teléfono fijo: {{ $user->phone ?: 'No disponible' }}
- Teléfono alternativo: {{ $user->fax ?: 'No disponible' }}

Los datos de la publicación:

- Título: {{ $property->title }}
- Tipo: {{ $property->property_type->name }}
- Cantidad de pisos: {{ $property->floors }}
- Precio de venta: $ {{ number_format($property->sell_price,2,',','.') }}
- Precio de renta: $ {{ number_format($property->rental_price,2,',','.') }}
- Costos de mantenimiento: $ {{ $property->maintenance_expenses }}
- Dirección: {{ $property->address->location }}
- Descripción: {{ $property->description }}
- Días disponibles: {{ implode(',', json_decode($property->days_available)) }}
- Horarios disponibles: {{ $property->hours_available }}
- Estado de la propiedad: {{ $property->property_condition_name }}
- Antigüedad: {{ $property->years }}
- Sup. del terreno: {{ $property->ground_surface }}
- Sup. cubierta: {{ $property->covered_surface }}
- Habitaciones: {{ $property->rooms }}
- Baños: {{ $property->bathrooms }}
- Cocheras: {{ $property->parking }}
- Elevador: {{ $property->elevator ? 'Sí' : 'No' }}

Los datos de contacto son:

- Email: {{ $property->contact->email }}
- Teléfono de línea: {{ $property->contact->phone }}
- Teléfono móvil: {{ $property->contact->mobile }}
- Teléfono alternativo: {{ $property->contact->fax }}

Saludos.

@endcomponent
