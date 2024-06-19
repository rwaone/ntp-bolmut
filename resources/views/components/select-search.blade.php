<div id="{{ $name }}-combobox-{{ $uniqueId }}" class="relative w-full">
    <label for="{{ $name }}-input" class=" form-label">{{ $name }}</label>
    <input type="text" name="{{ $name }}_name" class="w-full p-2 border border-gray-300 rounded"
        placeholder="Select an option" autocomplete="off" />
    <input type="text" name="{{ $name }}_id" class="w-full p-2 border border-gray-300 rounded hidden" />
    <div
        class="{{ $name }}-options absolute z-10 w-full max-h-72 overflow-y-auto  mt-1 bg-white border border-gray-300 rounded shadow-lg hidden">
        @foreach ($datas as $data)
            <div class="{{ $name }}-option p-2 cursor-pointer hover:bg-gray-200"
                data-value="{{ $data->id }}">
                {{ $data->name }}</div>
        @endforeach
    </div>
</div>

<script>
    (function() {
        const comboboxContainer = document.getElementById('{{ $name }}-combobox-{{ $uniqueId }}');
        const comboboxInput = comboboxContainer.querySelector('input[name="{{ $name }}_name"]');
        const comboboxValue = comboboxContainer.querySelector('input[name="{{ $name }}_id"]');
        // const comboboxValue = document.getElementById('kecamatan-id');
        const comboboxOptions = comboboxContainer.querySelector('div.{{ $name }}-options');
        const options = comboboxContainer.querySelectorAll('.{{ $name }}-option');

        comboboxInput.addEventListener('focus', () => {
            comboboxOptions.classList.remove('hidden');
        });

        comboboxInput.addEventListener('blur', () => {
            setTimeout(() => comboboxOptions.classList.add('hidden'), 200);
        });

        Array.from(options).forEach(option => {
            option.addEventListener('click', () => {
                const dataValue = option.getAttribute('data-value');
                comboboxInput.value = option.textContent.trim();
                comboboxValue.value = dataValue;
                comboboxOptions.classList.add('hidden');

                if ("{{ $dependentComponentId }}".length > 0) {
                    fetchDependentData(comboboxValue.value, '{{ $dependentComponentId }}');
                }

            });
        });

        comboboxInput.addEventListener('input', function() {
            const filter = comboboxInput.value.toLowerCase();
            Array.from(options).forEach(option => {
                const text = option.textContent.toLowerCase();
                if (text.includes(filter)) {
                    option.classList.remove('hidden');
                } else {
                    option.classList.add('hidden');
                }
            });
        });
        comboboxInput.addEventListener('keydown', (event) => {
            console.log("pressed", event.key);
            if (event.key !== 'Enter') return
            const dataValue = option.getAttribute('data-value');
            comboboxInput.value = option.textContent.trim();
            comboboxValue.value = dataValue;
            comboboxOptions.classList.add('hidden');
            // ambil data desa berdasarkan kecamatan


        });

        function fetchDependentData(selectedValue, dependentComponentId) {
            axios.get('/api/{{ $dependentName }}', {
                    params: {
                        '{{ $name }}_id': selectedValue
                    }
                })
                .then(response => {
                    // Update the dependent select component with the fetched data
                    const dependentContainer = document.getElementById(
                        `{{ $dependentName }}-combobox-${dependentComponentId}`);
                    const dependentOptionsContainer = dependentContainer.querySelector('div.desa-options')
                    dependentOptionsContainer.innerHTML = ''; // Clear existing options

                    response.data.forEach(data => {
                        const optionElement = document.createElement('div');
                        optionElement.classList.add('{{ $dependentName }}-option', 'p-2',
                            'cursor-pointer', 'hover:bg-gray-200');
                        optionElement.setAttribute('data-value', data.id);
                        optionElement.textContent = data.name;
                        dependentOptionsContainer.appendChild(optionElement);

                        // Add event listener for new options
                        optionElement.addEventListener('click', () => {
                            const dependentInputField = document.getElementById(
                                `{{ $dependentName }}-input-${dependentComponentId}`);
                            const dependentHiddenInputField = document.getElementById(
                                `{{ $dependentName }}-id-${dependentComponentId}`);
                            dependentInputField.value = optionElement.textContent.trim();
                            dependentHiddenInputField.value = optionElement.getAttribute(
                                'data-value');
                            dependentOptionsContainer.classList.add('hidden');
                        });
                    });
                })
                .catch(error => {
                    console.error('Error fetching dependent data:', error);
                });
        }
    })();
</script>
