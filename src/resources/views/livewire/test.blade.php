<div>
    <style>
        .modal-content {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }
    </style>

    @if($isOpen)
    <div class="modal-content">
        <h2>モーダルウインドウ</h2>
        <p>お元気ですか</p>
        <button wire:click="closeModal">閉じる</button>
    </div>
    @endif
</div>