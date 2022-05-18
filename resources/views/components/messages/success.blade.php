@if(session()->has('success_message'))
    <div class="my-4">
        <div class="px-4 py-3 leading-normal text-green-700 bg-green-100 rounded-lg" role="alert">
            <p>{{ session()->get('success_message') }}</p>
        </div>
    </div>
@endif