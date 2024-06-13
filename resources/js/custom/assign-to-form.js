export const assignToForm = (formId, values) => {
    const form = document.getElementById(formId);
    for (const key in values) {
        if (values.hasOwnProperty(key)) {
            const input = form.querySelector(`[name="${key}"]`);
            if (input) {
                input.value = dataValue[key];
            }
        }
    }
};
