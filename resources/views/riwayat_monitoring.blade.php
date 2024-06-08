@extends('layouts.app')

@section('content')
    <h1 class="text-4xl font-bold">Riwayat Monitoring</h1>
    <p class="mt-4">Hasil Monitoring Sebelumnya Bisa Dilihat Kembali Disini</p>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Riwayat Monitoring</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Tanggal dan Waktu</th>
                    <th class="py-2 px-4 border-b">BPM</th>
                    <th class="py-2 px-4 border-b">SPO2</th>
                    <th class="py-2 px-4 border-b">GSR</th>
                    <th class="py-2 px-4 border-b">Blood Pressure</th>
                    <th class="py-2 px-4 border-b">Mental Health Indicator</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $record->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->created_at }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->hr }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->spo }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->gsr }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->br }}</td>
                    <td class="py-2 px-4 border-b">{{ $record->indicator }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection