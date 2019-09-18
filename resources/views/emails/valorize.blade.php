@component('mail::message')
# Solicitud de valorización de inmueble
<table>
  <tbody>
    @foreach($data as $k => $v)
    <tr>
      <th>{{ $k }}</th>
      <td>{{ $v }}</td>
    </tr>
    @endforeach
  <tbody>
</table>

Gracias,<br>
{{ config('app.name') }}
@endcomponent
