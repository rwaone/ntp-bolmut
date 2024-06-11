<x-app-layout>
    <div class="space-y-8">
        {{-- <div> --}}
        <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        {{-- </div> --}}

        <div class="md:flex justify-between items-center">
            <div>
            </div>
            <div class="flex flex-wrap">

                <span class="flex items-center">
                    <input id="komoditas-search" name="search" type="text" class="form-control"
                        placeholder="Cari Komoditas">
                </span>
                <button class="btn inline-flex justify-center btn-sm btn-dark dark:bg-slate-700 dark:text-slate-300 m-1 "
                    data-bs-toggle="modal" data-bs-target="#modalCreate">
                    <span class="flex items-center">
                        <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="ph:plus-bold"></iconify-icon>
                        <span>Tambah Bagian</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-list" role="tabpanel" aria-labelledby="pills-list-tab">
                <div class="tab-content">
                    <div class="card">
                        <div class="card-body px-6 rounded overflow-hidden">
                            <div class="overflow-x-auto -mx-6">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                        @include('section.section-table')
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('section.modal')
    </div>

    @push('scripts')
    @endpush
    <script type="text/javascript">
        $('#button-create').on('click', (e) => {
            e.preventDefault();
            let data = $('#form-create').serialize();
            $.ajax({
                type: 'POST',
                url: 'komoditas/store',
                data: data,
                success: (result) => {
                    $('#data-table-komoditas').html(result.html)
                    $('#form-create')[0].reset();
                    $('[data-bs-dismiss="modal"]').click();
                },
                error: (error) => {
                    console.error(error)
                }
            })
        })
        const update = (value) => {
            $.ajax({
                type: 'GET',
                url: 'sections/' + value + '/edit',
                success: (result) => {
                    $('#form-update').attr('action', 'sections/' + value);
                    $('#update_name').val(result.name);
                    $('#update_document_id').val(result.document_id);
                },
                error: (error) => {
                    console.error(error)
                }
            })
        }
        function deleteConfirm(value) {
                $('#form-delete').attr('action', 'sections/' + value);
            }
    </script>
</x-app-layout>
