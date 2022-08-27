@extends('layouts.app')
@section('content')
<div>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label>TITLE</label>
                    <input type="text" wire:model="title" class="form-control @error('title') is-invalid @enderror"
                        placeholder="Masukkan Title">
                    @error('title')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>KONTEN</label>
                    <textarea wire:model="content" class="form-control @error('content') is-invalid @enderror" rows="4"
                        placeholder="Masukkan Konten"></textarea>
                    @error('content')
                    <span class="invalid-feedback">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <button wire:click.prevent="store()" class="btn btn-primary">SIMPAN</button>
                <a href="{{ route('post.index') }}" class="btn btn-success">KEMBALI</a>
            </form>
        </div>
    </div>
</div>
@endsection
