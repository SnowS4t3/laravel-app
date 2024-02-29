<!DOCTYPE html>

<h3 class="page-title">お問い合わせ詳細</h3>

<ul class="contact-details">
    <li>お名前: {{ $contact->name }}</li>
    <li>メールアドレス: {{ $contact->mail }}</li>
    <li>お問い合わせ内容: <br>{!! nl2br($contact->comment) !!}</li>
</ul>

<a href="/" class="back-to-top-link">TOPに戻る</a>
<a href={{ route('contact.list') }} class="back-to-top-link">お問い合わせ一覧に戻る</a>