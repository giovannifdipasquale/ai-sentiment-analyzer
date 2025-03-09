<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <h1 class="text-center bg-air text-jet p-3">Chat with Llama-3.1-8b</h1>
        <div class="card-body">
            <form wire:submit.prevent="sendPrompt" class="mb-3">
                <div class="mb-3">
                    <input type="text" name="message" class="form-control" id="chatInput"
                        placeholder="Type your message here..." wire:model="prompt" required>
                    @error('prompt')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-jet w-100">Chat</button>
            </form>

            <div class="response">
                <h5 class="text-jet">Response:</h5>
                <div id="chatResponse" class="border border-jet p-3 my-4 rounded">
                    @foreach ($messages as $message)
                    <div
                        class="message rounded p-2 mb-2 @if ($message['role'] == 'user') text-jet bg-air @else bg-light-gray @endif">
                        <b class=" @if ($message['role'] == 'user') @else text-jet @endif">{{ $message['role'] ==
                            'user' ? 'User' : 'Assistant' }}:</b>
                        <span> {{ $message['content'] }}
                        </span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>