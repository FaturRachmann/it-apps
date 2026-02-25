@props([
    'message' => '',
    'type' => 'success' // success, error, warning, info
])

@push('scripts')
<script>
function showToast(message, type = 'success') {
    const toast = document.createElement('div');
    toast.id = 'toast-' + type;
    toast.className = 'fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-lg border ' +
        (type === 'success' ? 'border-success/20' : 
         type === 'error' ? 'border-error/20' : 
         type === 'warning' ? 'border-warning/20' : 'border-info/20') +
        ' animate-slideInRight';
    
    let iconColorClass = '';
    switch(type) {
        case 'success':
            iconColorClass = 'text-success bg-success/10';
            break;
        case 'error':
            iconColorClass = 'text-error bg-error/10';
            break;
        case 'warning':
            iconColorClass = 'text-warning bg-warning/10';
            break;
        case 'info':
            iconColorClass = 'text-info bg-info/10';
            break;
    }
    
    toast.innerHTML = `
        <div class="inline-flex items-center justify-center flex-shrink-0 w-10 h-10 ${iconColorClass} rounded-lg">
            ${type === 'success' ? 
                '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>' :
              type === 'error' ?
                '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.1 11.118a1 1 0 0 1-1.414 0L10 9.914l-1.686 1.686a1 1 0 0 1-1.414-1.414l2.4-2.4a1 1 0 0 1 1.414 0l2.4 2.4a1 1 0 0 1 0 1.414Z"/></svg>' :
              type === 'warning' ?
                '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/></svg>' :
                '<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/></svg>'
            }
        </div>
        <div class="ms-3 text-sm font-medium text-gray-900">${message}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 transition-colors" onclick="this.parentElement.remove()">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    `;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.remove();
    }, 5000);
}

// Example usage after successful form submission
@if(session('success'))
    showToast("{{ session('success') }}", 'success');
@endif
@if(session('error'))
    showToast("{{ session('error') }}", 'error');
@endif
</script>
@endpush