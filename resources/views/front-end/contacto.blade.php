@extends('front-end.layouts.app')
@section('title')
    Contacto - Giltec
@endsection
@section('main-content')
<section class="contacto-container">
    <div class="form-content">
        <form>
            <div class="input-group">
                <div class="group-item">
                    <label for="">Nombre</label>
                    <input type="text" name="name" placeholder="Inserte su nombre">
                </div>
                <div class="group-item">
                    <label for="">Apellidos</label>
                    <input type="email" name="email" placeholder="Inserte su email">
                </div>
            </div>
            <div class="input-single">
                <label for="">Telefono</label>
                <input type="tel" name="tel" placeholder="Inserte su numero de telefono">
            </div>
            <div class="input-textarea">
                <label for="">Mensaje</label>
                <textarea name="message"></textarea>
            </div>
            <div class="input-btn_submit">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</section>
@endsection
