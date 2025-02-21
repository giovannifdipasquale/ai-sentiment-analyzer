<div class="container text-center">
    <h2 class="mb-4">Sentiment Analyzer</h2>
    <textarea id="inputText" class="form-control mb-3" rows="3" placeholder="Enter text here..."
        wire:model="input"></textarea>
    <button class="btn btn-primary" wire:click="analyzeSentiment">
        <i class="bi bi-thermometer"></i> Analyze Sentiment
    </button>
    <div class="mt-3" id="sentimentResult">
        @if ($sentiment)
        <p class="fs-3">Sentiment: {!! $sentiment !!}</p>
        @endif
    </div>
</div>