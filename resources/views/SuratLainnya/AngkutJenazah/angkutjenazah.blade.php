@extends('main')

@section('content')
<div class="container">
    <center class="mt-4">    
        <h3 class="mb-4">
            Surat Keterangan Pengiriman Jenazah
        </h3>
    </center>

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Data Jenazah -->
        <div class="card mb-3">
            <div class="card-header">Data Jenazah</div>
            <div class="card-body">
                
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="deceased_name" class="form-control @error('deceased_name') is-invalid @enderror" value="{{ old('deceased_name') }}">
                    @error('deceased_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tempat Lahir</label>
                        <input type="text" name="birth_place" class="form-control" value="{{ old('birth_place') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-select">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('gender')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('gender')=='Perempuan'?'selected':'' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kewarganegaraan</label>
                        <input type="text" name="nationality" class="form-control" value="{{ old('nationality','Indonesia') }}">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">NIK / Nomor Identitas</label>
                        <input type="text" name="identity_number" class="form-control" value="{{ old('identity_number') }}">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal & Waktu Meninggal</label>
                    <input type="datetime-local" name="date_of_death" class="form-control" value="{{ old('date_of_death') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempat Meninggal</label>
                    <input type="text" name="place_of_death" class="form-control" value="{{ old('place_of_death') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Penyebab Kematian (sesuai surat keterangan medis)</label>
                    <textarea name="cause_of_death" class="form-control">{{ old('cause_of_death') }}</textarea>
                </div>

            </div>
        </div>

        <!-- Rincian Pengiriman -->
        <div class="card mb-3">
            <div class="card-header">Rincian Pengiriman Jenazah</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Metode Transportasi</label>
                    <input type="text" name="transport_method" class="form-control" placeholder="Misal: Kargo Udara / Ambulans Darat" value="{{ old('transport_method') }}">
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama Maskapai / Jasa Pengangkut</label>
                        <input type="text" name="carrier_name" class="form-control" value="{{ old('carrier_name') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor Penerbangan (jika ada)</label>
                        <input type="text" name="flight_number" class="form-control" value="{{ old('flight_number') }}">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal & Waktu Pengiriman / Keberangkatan</label>
                    <input type="datetime-local" name="shipping_datetime" class="form-control" value="{{ old('shipping_datetime') }}">
                </div>

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Asal (Kota)</label>
                        <input type="text" name="origin_city" class="form-control" value="{{ old('origin_city') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tujuan (Kota)</label>
                        <input type="text" name="destination_city" class="form-control" value="{{ old('destination_city') }}">
                    </div>

                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Tujuan Pengiriman (rumah duka / pemakaman)</label>
                    <textarea name="destination_address" class="form-control">{{ old('destination_address') }}</textarea>
                </div>

            </div>
        </div>

        <!-- Penanggung Jawab -->
        <div class="card mb-3">
            <div class="card-header">Penanggung Jawab / Penerima Tujuan</div>
            <div class="card-body">

                <div class="mb-3">
                    <label class="form-label">Nama Penanggung Jawab di Tujuan</label>
                    <input type="text" name="recipient_name" class="form-control" value="{{ old('recipient_name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Telepon Penanggung Jawab</label>
                    <input type="text" name="recipient_phone" class="form-control" value="{{ old('recipient_phone') }}">
                </div>

            </div>
        </div>

        <!-- Penanganan Jenazah -->
        <div class="card mb-3">
            <div class="card-header">Penanganan Jenazah</div>
            <div class="card-body">

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="1" id="embalmed" name="embalmed" {{ old('embalmed') ? 'checked' : '' }}>
                    <label class="form-check-label" for="embalmed">Jenazah telah melalui proses pembalseman / formalin</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Catatan Pembalseman (jika ada)</label>
                    <textarea name="embalming_notes" class="form-control">{{ old('embalming_notes') }}</textarea>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" value="1" id="sealed_coffin" name="sealed_coffin" {{ old('sealed_coffin', true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="sealed_coffin">Peti jenazah tertutup rapat, disegel, dan aman untuk diangkut</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Unggah Dokumen Medis (pdf/jpg/png)</label>
                    <input type="file" name="medical_certificate" class="form-control">
                    @error('medical_certificate') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="" class="btn btn-secondary">Batal</a>
            <button class="btn btn-primary" type="submit">Ajukan Surat</button>
        </div>

    </form>
</div>
@endsection
