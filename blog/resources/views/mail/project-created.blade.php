@component('mail::message')
# a new-project:{{$project->title}}
{{$project->description}}

The body of your message.

@component('mail::button', ['url' => url('/projects/'.$project->id)])
view project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
