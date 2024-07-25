@extends('layout.main')

@section('content')
    <x-breadcrumb
        :values="[__('menu.transaction.menu'), __('menu.transaction.outgoing_letter'), __('menu.general.create')]">
    </x-breadcrumb>

    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif

    <div class="card mb-4">
        <form action="{{ route('transaction.outgoing.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <input type="hidden" name="type" value="outgoing">
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="reference_number" :label="__('model.letter.reference_number')"/>
                </div>
                {{-- <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="to" :label="__('model.letter.to')"/>
                </div> --}}
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    {{-- <x-input-form name="from" :label="__('model.letter.from')"/> --}}
                    <label for="from"
                        class="form-label">{{ __('model.letter.from') }}</label>
                        <select class="form-select" id="to" name="to">
                            @foreach($users as $user)
                                <option
                                    value="{{ $user->name }}"
                                    @selected(old('to') == $user->name)>
                                    {{ $user->name}}
                                </option>
                            @endforeach
                        </select>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <x-input-form name="agenda_number" :label="__('model.letter.agenda_number')"/>
                </div>
                
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <label for="disposition_user"
                    class="form-label">PEMBERI DISPOSISI PERTAMA</label>
                    <select class="form-select" id="disposition_user_id" name="disposition_user_id">
                        @foreach($users as $user)
                            <option
                                value="{{ $user->id }}"
                                @selected(old('disposition_user') == $user->id)>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-sm-12 col-12 col-md-6 col-lg-12">
                    <x-input-form name="letter_date" :label="__('model.letter.letter_date')" type="date"/>
                </div>
                {{-- <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="received_date" :label="__('model.letter.received_date')" type="date"/>
                </div> --}}
                <div class="col-sm-12 col-12 col-md-12 col-lg-12">
                    <x-input-textarea-form name="description" :label="__('model.letter.description')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="classification_code" class="form-label">{{ __('model.letter.classification_code') }}</label>
                        <select class="form-select" id="classification_code" name="classification_code">
                            @foreach($classifications as $classification)
                                <option
                                    value="{{ $classification->code }}"
                                    @selected(old('classification_code') == $classification->code)>
                                    {{ $classification->code }} - {{ $classification->type }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <div class="mb-3">
                        <label for="signer_code"
                               class="form-label">{{ __('model.letter.signer_code') }}</label>
                        <select class="form-select" id="signer_code" name="signer_code">
                            @foreach($signers as $signer)
                                <option
                                    value="{{ $signer->code }}"
                                    @selected(old('signer_code') == $signer->code)>
                                    {{ $signer->code }} - {{ $signer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-6">
                    <x-input-form name="note" :label="__('model.letter.note')"/>
                </div>
                <div class="col-sm-12 col-12 col-md-6 col-lg-4">
                    <div class="mb-3">
                        <label for="attachments" class="form-label">{{ __('model.letter.attachment') }}</label>
                        <input type="file" class="form-control @error('attachments') is-invalid @enderror" id="attachments" name="attachments[]" multiple />
                        <span class="error invalid-feedback">{{ $errors->first('attachments') }}</span>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0">
                <button class="btn btn-primary" type="submit">{{ __('menu.general.save') }}</button>
            </div>
        </form>
    </div>
@endsection
