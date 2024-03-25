@extends('layouts.app')

@section('content')

    <main>
        <section id="confirm" class="contents">
            <h2 class="section_title">お問い合わせ内容確認</h2>
            
                <div class="confirm_message">
                    <p>以下の内容でよろしいですか？</p>
                </div>

            <form action="{{ route('contact.send') }}" method="post">
                @csrf
                <dl>
                    <dt>
                        <label for="name">名前</label>
                    </dt>
                    <dd>
                        <input type="hidden" name="your_name" value="{{ $data['your_name'] }}">{{ $data['your_name'] }}
                    </dd>
                    
                    <dt>
                        <label for="contents">お問い合わせ内容</label>
                    </dt>
                    <dd>
                        <input type="hidden" name="your_comments" value="{{ $data['your_comments'] }}">{{ $data['your_comments'] }}
                    </dd>
                </dl>

                <div class="button">
                    <button type="button" onclick="history.back()">戻る</button>
                    <button type="submit">送信</button>
                </div>
            </form>
        </section>
    </main>

@endsection