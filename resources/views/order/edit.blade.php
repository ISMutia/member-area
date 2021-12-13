@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4>Edit Order</h4>
                        <br>
                        <form action="{{ route('order.update', ['id' => $dataOrder->id]) }}" method="POST">
                            @method('put')
                            @csrf

                            <div class="form-group">
                                <label for="id_customers">Customers</label>
                                <select name="id_customers" class="form-control form-group-sm">
                                    @foreach ($dataUser as $d)
                                        <option value="{{ $d->id }}" @if ($dataOrder->id_customers == $d->id) selected @endif>
                                            {{ $d->fullname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" name="project_name" class="form-control" placeholder="Project Name"
                                    value="{{ $dataOrder->project_name }}">
                            </div>

                            <div class="form-group">
                                <label for="id_domain">Domain Extention</label>
                                <select name="id_domain" id="id_domain" class="form-control form-control-sm">
                                    @foreach ($dataDomain as $d)
                                        <option value="{{ $d->id }}" @if ($dataOrder->id_domain == $d->id) selected @endif>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_price">Package</label>
                                <select name="id_price" id="id_price" class="form-control form-group-sm">
                                    @foreach ($dataPrice as $d)
                                        <option value="{{ $d->id }}" @if ($dataOrder->id_price == $d->id) selected @endif>
                                            {{ $d->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label>Status :</label>
                                <select name="id_status" class="form-control form-control-sm">
                                    @foreach ($dataStatus as $d)
                                        <option value="{{ $d->id }}" @if ($dataOrder->bill->status->id == $d->id) selected @endif>
                                            {{ $d->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
                            

                             <div class="form-group">
                                <label>Lama Pengerjaan</label>
                                <input type="text" name="lama_p" class="form-control" placeholder="Lama Pengerjaan"
                                    aria-label="Lama Pengerjaan" value="{{ $dataOrder->lama_p }}">
                            </div>

                            <div class="form-group">
                                <label>Mulai Pengerjaan</label>
                                <input type="date" name="mulai_p" class="form-control" placeholder="Mulai Pengerjaan"
                                    aria-label="Mulai Pengerjaan" value="{{ $dataOrder->mulai_p }}">
                            </div>

                            <div class="form-group">
                                <label>Selesai Pengerjaan</label>
                                <input type="date" name="selesai_p" class="form-control" placeholder="Selesai Pengerjaan"
                                    aria-label="Selesai Pengerjaan" value="{{ $dataOrder->selesai_p }}">
                            </div>

                            <div class="form-group">
                                <label>Lama Domain</label>
                                <input type="date" name="lama_domain" class="form-control" placeholder="Lama Domain"
                                    aria-label="Lama Domain" value="{{ $dataOrder->lama_domain }}">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#id_domain').change(function() {
                let idPrice = $(this).find(':selected').data('price');

                $('#id_price').val(idPrice);
            });

            $('#id_price').change(function() {
                let idPrice = $(this).val();

                $('#id_domain').find('option').removeAttr('selected');
                $('#id_domain').find(`[data-price="${idPrice}"]`).attr('selected', 'selected');
            });
        });
    </script>
@endsection
