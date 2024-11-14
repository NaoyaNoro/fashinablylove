

<div>
    @if($showModal)
    <div class="modal-overlay" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
        <div class="modal-window" style="position: relative; margin: auto; padding: 20px; background: #fff; border-radius: 8px; width: 50%;">
            <button wire:click="closeModal" style="position: absolute; top: 10px; right: 10px;">✖︎</button>

            <h2>詳細情報</h2>
            @if($contact)
            <p>名前: {{ $contact->first_name }} {{ $contact->last_name }}</p>
            <p>性別: {{ $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他') }}</p>
            <p>メールアドレス: {{ $contact->email }}</p>
            <p>電話番号: {{ $contact->phone }}</p>
            <p>住所: {{ $contact->address }}</p>
            <!-- 他の項目も必要に応じて追加 -->
            @else
            <p>データが存在しません。</p>
            @endif
        </div>
    </div>
    @endif
</div>