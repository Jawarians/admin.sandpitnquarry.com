@extends('layout.layout')
@php
    $title='Notification';
    $subTitle = 'Settings - Notification';

@endphp

@section('content')

            <div class="card h-100 p-0 radius-12 overflow-hidden">
                <div class="card-body p-40">
                    <form action="#">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseSecretKey" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase server key</label>
                                    <input type="password" class="form-control radius-8" id="firebaseSecretKey" placeholder="Firebase server key" value="{{ config('firebase.server_key') ? '••••••••••••••••••••••••••••••••••••••••' : 'Not configured' }}" readonly>
                                    <small class="text-muted">Configured via environment variables</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebasePublicVapidKey" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase public vapid key (key pair)</label>
                                    <input type="text" class="form-control radius-8" id="firebasePublicVapidKey" placeholder="Firebase public vapid key (key pair)" value="{{ config('firebase.vapid_key') ?? 'Not configured' }}" readonly>
                                    <small class="text-muted">Safe to display - configured via environment variables</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseAPIKey" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase API Key</label>
                                    <input type="text" class="form-control radius-8" id="firebaseAPIKey" placeholder="Firebase API Key" value="{{ config('firebase.api_key') ?? 'Not configured' }}" readonly>
                                    <small class="text-muted">Safe to display - configured via environment variables</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseAuthDomain" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase AUTH Domain</label>
                                    <input type="text" class="form-control radius-8" id="firebaseAuthDomain" placeholder="Firebase AUTH Domain" value="{{ config('firebase.auth_domain') ?? 'Not configured' }}" readonly>
                                    <small class="text-muted">Safe to display - configured via environment variables</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseProjectID" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase Project ID</label>
                                    <input type="text" class="form-control radius-8" id="firebaseProjectID" placeholder="Firebase Project ID" value="wowdash.com">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseStorageBucket" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase Storage Bucket</label>
                                    <input type="text" class="form-control radius-8" id="firebaseStorageBucket" placeholder="Firebase Storage Bucket" value="wowdash.appsport.com">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseMessageSenderID" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase Message Sender ID</label>
                                    <input type="text" class="form-control radius-8" id="firebaseMessageSenderID" placeholder="Firebase  Message Sender ID" value="52362145">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-20">
                                    <label for="firebaseAppID" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase App ID</label>
                                    <input type="text" class="form-control radius-8" id="firebaseAppID" placeholder="Firebase  App ID" value="1:843456771665:web:ac1e3115e9e17ee1582a70">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="mb-20">
                                    <label for="firebaseMeasurmentID" class="form-label fw-semibold text-primary-light text-sm mb-8">Firebase Measurement ID</label>
                                    <input type="text" class="form-control radius-8" id="firebaseMeasurmentID" placeholder="Firebase  Measurement ID" value="G-GSJPS921XW">
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center gap-3 mt-24">
                                <button type="reset" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-40 py-11 radius-8">
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary border border-primary-600 text-md px-24 py-12 radius-8">
                                    Save Change
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection