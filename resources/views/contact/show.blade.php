@extends('layouts.app')

@section('content')

    <main>
        <section id="list" class="contents">
            <h2 class="section_title">お問い合わせ内容一覧</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th class="name">名前</th>
                            <th class="contents">お問い合わせ内容</th>
                            <th class="date">日付</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                    <tr>
                        <td class="name">{{ $content->name }}</td>
                        <td class="contents">{{ $content->comment }}</td>
                        <td class="date">{{ $content->created_at->format('Y/m/d') }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="button">
                    <button type="button" onclick="location.href='{{ route('contact.index') }}'">戻る</button>
                </div>
        </section>
    </main>

@endsection