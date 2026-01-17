@extends('tablar::page')

@section('content')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">Quản lý</div>
                    <h2 class="page-title">Sửa sản phẩm</h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <a href="{{ route('products.index') }}" class="btn btn-link">Quay lại</a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('products._form', ['product' => $product])
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('products.index') }}" class="btn btn-link">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <style>
        /* Custom styling for Tom Select to match Tabler UI */
        #product-categories-select.ts-wrapper {
            min-height: 42px;
        }
        
        #product-categories-select.ts-wrapper .ts-control {
            border: 1px solid var(--tblr-border-color, #d9dee3);
            border-radius: var(--tblr-border-radius, 0.375rem);
            padding: 0.375rem 0.75rem;
            min-height: 42px;
            background-color: var(--tblr-bg-surface, #fff);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        
        #product-categories-select.ts-wrapper .ts-control.focus {
            border-color: var(--tblr-primary, #206bc4);
            box-shadow: 0 0 0 0.2rem rgba(32, 107, 196, 0.25);
        }
        
        #product-categories-select.ts-wrapper .ts-control .ts-control-input {
            padding: 0;
            margin: 0;
        }
        
        #product-categories-select.ts-wrapper .ts-control .ts-control-input input {
            font-size: 0.875rem;
            line-height: 1.5;
        }
        
        /* Selected items styling */
        #product-categories-select.ts-wrapper .ts-control .item {
            background: var(--tblr-primary, #206bc4);
            color: #fff;
            border: none;
            border-radius: 0.25rem;
            padding: 0.25rem 0.5rem;
            margin: 0.125rem 0.25rem 0.125rem 0;
            font-size: 0.8125rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
        }
        
        #product-categories-select.ts-wrapper .ts-control .item.active {
            background: var(--tblr-primary-dark, #1a5499);
        }
        
        #product-categories-select.ts-wrapper .ts-control .item .remove {
            border: none;
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
            border-radius: 0.125rem;
            width: 18px;
            height: 18px;
            padding: 0;
            margin: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.875rem;
            line-height: 1;
            cursor: pointer;
            transition: background-color 0.15s ease;
        }
        
        #product-categories-select.ts-wrapper .ts-control .item .remove:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        /* Dropdown styling */
        .ts-dropdown,
        .ts-dropdown.form-control,
        .ts-dropdown.form-select {
            background: #fff !important;
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown {
            border: 1px solid var(--tblr-border-color, #d9dee3);
            border-radius: var(--tblr-border-radius, 0.375rem);
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-top: 0.25rem;
            background: #fff !important;
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .ts-dropdown-content {
            max-height: 300px;
            background: #fff;
        }
        
        /* Option styling */
        #product-categories-select.ts-wrapper .ts-dropdown .option {
            padding: 0.625rem 0.75rem;
            cursor: pointer;
            transition: background-color 0.15s ease;
            border-bottom: 1px solid var(--tblr-border-color-subtle, #f0f0f0);
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .option:last-child {
            border-bottom: none;
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .option:hover {
            background-color: var(--tblr-bg-surface-secondary, #f8f9fa);
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .option.active {
            background-color: var(--tblr-primary-bg-subtle, #e7f3ff);
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .option span {
            font-size: 0.875rem;
            color: var(--tblr-body-color, #495057);
        }
        
        /* Search input styling */
        #product-categories-select.ts-wrapper .ts-dropdown .ts-dropdown-input {
            border: none;
            border-bottom: 1px solid var(--tblr-border-color, #d9dee3);
            border-radius: 0;
            padding: 0.75rem;
            font-size: 0.875rem;
            background:  #fff;
        }
        
        #product-categories-select.ts-wrapper .ts-dropdown .ts-dropdown-input:focus {
            outline: none;
            border-bottom-color: var(--tblr-primary, #206bc4);
        }
        
        /* No results styling */
        #product-categories-select.ts-wrapper .ts-dropdown .no-results {
            padding: 1rem;
            text-align: center;
            color: var(--tblr-text-muted, #6c757d);
            font-size: 0.875rem;
        }
        
        /* Placeholder styling */
        #product-categories-select.ts-wrapper .ts-control .ts-control-input input::placeholder {
            color: var(--tblr-text-muted, #6c757d);
            opacity: 0.6;
        }
    </style>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectElement = document.getElementById('product-categories-select');
        if (selectElement) {
            let tomSelect;
            
            tomSelect = new TomSelect('#product-categories-select', {
                plugins: {
                    'remove_button': {
                        title: 'Xóa',
                        label: '×'
                    }
                },
                maxItems: null,
                placeholder: 'Tìm kiếm và chọn loại sản phẩm...',
                searchField: ['text'],
                render: {
                    option: function(data, escape) {
                        return '<div data-value="' + escape(data.value) + '">' +
                            '<span>' + escape(data.text) + '</span>' +
                            '</div>';
                    },
                    item: function(data, escape) {
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    no_results: function() {
                        return '<div class="no-results">Không tìm thấy kết quả</div>';
                    }
                },
                onItemAdd: function(value) {
                    const option = selectElement.querySelector(`option[value="${value}"]`);
                    if (option) option.selected = true;
                },
                onItemRemove: function(value) {
                    const option = selectElement.querySelector(`option[value="${value}"]`);
                    if (option) option.selected = false;
                }
            });
            
        }
    });
    </script>
@endsection
