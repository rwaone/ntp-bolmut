<div>

    <button class="filter-btn btn inline-flex justify-center btn-white dark:bg-slate-700 dark:text-slate-300 m-1 ">
        <span class="flex items-center">
            <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2" icon="heroicons-outline:filter"></iconify-icon>
            <span>Filter Wilayah</span>
        </span>


    </button>
    <div class="filter-container card absolute mt-2 z-10 hidden">
        <div class="card-body flex flex-col p-6">
            <div class="card-text h-full ">
                <form class="space-y-4" id="filter-form">
                    @foreach ($properties as $property)
                        <div class="input-area relative">
                            <label for="largeInput" class="form-label">{{ $property['label'] }}</label>
                            <input name="{{ $property['value'] }}" type="text" class="form-control"
                                placeholder="masukkan kata kunci" value="{{stripos(json_encode($query),$property['value']) !== false?$query[$property['value']]:""}}">
                        </div>
                    @endforeach
                    <button type="submit" class="btn inline-flex justify-center btn-dark">Terapkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const filterButton = document.querySelector('button.filter-btn');
        const filterContainer = document.querySelector('div.filter-container');
        filterButton.addEventListener('click', (clickEvent) => {
            // filterContainer.classList.remove('hidden');
        })

        document.addEventListener('click', (clickEvent) => {
            if (!filterContainer.contains(clickEvent.target)) {
                if(filterButton.contains(clickEvent.target)){
                    // alert(filterContainer.classList.contains('hidden'))
                    if(filterContainer.classList.contains('hidden')) return filterContainer.classList.remove('hidden');
                    filterContainer.classList.add('hidden')
                    
                }
                filterContainer.classList.add('hidden');
            }

        })

        // fungsi apply 
        

    })
</script>
