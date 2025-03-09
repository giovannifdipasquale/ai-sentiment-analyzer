<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-sm" style="width: 100%; max-width: 600px;">
        <h1 class="text-center bg-air text-jet p-3"> Sentiment Analyzer </h1>
        <div class="card-body">
            <div class="mb-3">
                <textarea id="inputText" class="form-control" rows="3" placeholder="Enter text here..."
                    wire:model="input"></textarea>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-jet" wire:click="analyzeSentiment"> <i class="bi bi-thermometer me-2"></i>
                    Analyze Sentiment
                </button>
            </div>
            @if ($sentiment)
            <div class="mt-4 text-center">
                <p class="fs-4 text-jet">Sentiment: <span class="fw-bold">{!! $sentiment !!}</span>
                </p>
            </div>
            @endif
        </div>
    </div>
</div>