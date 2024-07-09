$('input[name="dateRange"]').daterangepicker();

document.getElementById('addRow').addEventListener('click', function() {
    $('input[name="dateRange"]').daterangepicker();
    
    const tableBody = document.getElementById('tableBody');
    const newRow = document.createElement('tr');
    const numColumns = document.querySelectorAll('#tableHeader th').length;

    for (let i = 0; i < numColumns; i++) {
        const newCell = document.createElement('td');
        newCell.className = 'p-2 border border-gray-300 editable-cell';
        if (i === 2) {
            newCell.innerHTML = '<select class="bg-white border border-gray-300 rounded px-2 py-1">' +
                                '<option value="Not Started">Not Started</option>' +
                                '<option value="In Progress">In Progress</option>' +
                                '<option value="Completed">Completed</option>';
        } else if (i === 3) {
            newCell.innerHTML = '<input type="text" name="dateRange" class="bg-white border border-gray-300 rounded px-2 py-1">';
        } else if (i === 4) {
            newCell.innerHTML ='<input type="file" name="filesUpload" class="bg-white border border-gray-300 rounded px-2 py-1">';
        } else if (i === 5) {
            newCell.innerHTML = '<button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button>';
        } else {
            newCell.textContent = `New Data`;
        }
        newRow.appendChild(newCell);
    }

    tableBody.appendChild(newRow);
    attachCellClickHandler(newRow);
    attachDeleteRowHandler(newRow);
});

function attachCellClickHandler(row) {
    row.querySelectorAll('.editable-cell').forEach(cell => {
        cell.addEventListener('click', function() {
            if (cell.querySelector('input') || cell.querySelector('select') || cell.querySelector('button')) return;

            const currentText = cell.textContent;
            const input = document.createElement('input');
            input.type = 'text';
            input.value = currentText;
            input.className = 'border rounded p-1';
            cell.textContent = '';
            cell.appendChild(input);
            input.focus();

            const finishEditing = () => {
                const newText = input.value.trim() || currentText;
                cell.textContent = newText;
            };

            input.addEventListener('blur', finishEditing);
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    finishEditing();
                }
            });
        });
    });
}

function attachDeleteRowHandler(row) {
    row.querySelectorAll('.delete-row').forEach(button => {
        button.addEventListener('click', function() {
            row.remove();
        });
    });
}

document.querySelectorAll('#tableBody tr').forEach(row => {
    attachCellClickHandler(row);
    attachDeleteRowHandler(row);
});