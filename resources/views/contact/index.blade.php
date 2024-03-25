@extends('layouts.app')

@section('content')

    <main>
        <div class="detail_button">
            <button type="button" onclick="location.href='{{ route('contact.show') }}'">過去のお問い合わせ</button>
        </div>

        <section id="index" class="contents">
            <h2 class="section_title">お問い合わせ</h2>

            <form action="{{ route('contact.confirm') }}" method="get">
                @csrf
                <dl>
                    <dt>
                        <label for="your_name">名前</label>
                    </dt>
                    <dd>
                        <input type="text" id="your_name" name="your_name" value="{{ old('your_name') }}">
                        @error('your_name')
                        <p class="validation_message">{{ $message }}</p>
                        @enderror
                    </dd>

                    <dt>
                        <label for="your_comments">お問い合わせ内容</label>
                    </dt>
                    <dd>
                        <textarea name="your_comments" id="your_comments">{{ old('your_comments') }}</textarea>
                        @error('your_comments')
                        <p class="validation_message">{{ $message }}</p>
                        @enderror
                    </dd>
                </dl>

                <div class="confirm_button">
                    <button type="submit">入力内容確認</button>
                </div>
            </form>
        </section>
    </main>

@endsection
