<!DOCTYPE html>
    <head>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <div class="contact">
        <h2>お問い合わせ詳細</h2>
    </div>

    <div class="form">

        <ul class="contact-details">
            <div class="form_title">
                <li>お名前: {{ $contact->name }}</li>
            </div>
            <div class="form_title">
                <li>メールアドレス: {{ $contact->mail }}</li>
            </div>
            <div class="form_title">
                <li>お問い合わせ内容: <br>{!! nl2br($contact->comment) !!}</li>
            </div>
        </ul>
        <form action="{{ route('update_contact', ['id' => $contact->id]) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="status">状態</label>
                    <select name="status" id="status" class="form-control">
                        @foreach(\App\Models\Contact::STATUS as $key => $val)
                            <option value="{{ $key }}" {{ $key == old('status', $contact->status) ? 'selected' : '' }}>
                                {{ $val['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="submit">
                <input type=submit  value="送信" class="button">
            </div>
        </form>
    </div>
    <div class="submit">
        <a href="/" class="back-to-top-link">TOPに戻る</a>
        <a href={{ route('admin.list') }} class="back-to-top-link">お問い合わせ一覧に戻る</a>
    </div>