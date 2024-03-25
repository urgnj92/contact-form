@extends('layouts.app')

@section('content')


    <main>
        <div class="detail_button">
            <button type="button" onclick="location.href='{{ route('contact.show') }}'">過去のお問い合わせ</button>
        </div>

        <section id="complete" class="contents">
            <h2 class="section_title">お問い合わせ</h2>
                
                <div class="message">
                    <p>お問い合わせを送信しました。</p>
                </div>

                <div class="button">
                    <button type="button" onclick="location.href='{{ route('contact.index') }}'">戻る</button>
                </div>
            </form>
        </section>
    </main>

@endsection