$('input[name="dateRange"]').daterangepicker();

document.getElementById('addRow').addEventListener('click', function() {
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

document.getElementById('addColumnDropdown').addEventListener('click', function() {
    const dropdown = document.getElementById('columnTypeDropdown');
    dropdown.classList.toggle('hidden');
});

document.getElementById('columnTypeDropdown').addEventListener('click', function(event) {
    const columnType = event.target.getAttribute('data-type');
    addColumn(columnType);
    const dropdown = document.getElementById('columnTypeDropdown');
    dropdown.classList.add('hidden');
});

function addColumn(type) {
    const tableHeader = document.getElementById('tableHeader');
    const tableBody = document.getElementById('tableBody');

    const newHeader = document.createElement('th');
    newHeader.className = 'p-2 border border-gray-300 cursor-pointer text-left';
    newHeader.textContent = type;
    tableHeader.appendChild(newHeader);

    attachHeaderClickHandler(newHeader);

    for (let row of tableBody.rows) {
        const newCell = document.createElement('td');
        newCell.className = 'p-2 border border-gray-300 editable-cell';
        if (type === 'Text') {
            newCell.textContent = `New Data`;
        } else if (type === 'Date') {
            newCell.innerHTML = '<input type="date" class="bg-white border border-gray-300 rounded px-2 py-1">';
        } else if (type === 'Dropdown') {
            newCell.innerHTML = '<select class="bg-white border border-gray-300 rounded px-2 py-1">' +
                                '<option value="Option 1">Option 1</option>' +
                                '<option value="Option 2">Option 2</option>' +
                                '<option value="Option 3">Option 3</option>';
        } else if (type === 'Owner') {
            newCell.innerHTML = '<input type="text" class="bg-white border border-gray-300 rounded px-2 py-1" placeholder="Owner Name">';
        } else if (type === 'Files') {
            newCell.innerHTML = '<input type="file" class="bg-white border border-gray-300 rounded px-2 py-1" placeholder="Choose Files">';
        }
        row.appendChild(newCell);
    }
}

function attachHeaderClickHandler(header) {
    header.addEventListener('click', function() {
        if (header.querySelector('input')) return;

        const currentText = header.textContent;
        const input = document.createElement('input');
        input.type = 'text';
        input.value = currentText;
        input.className = 'border rounded p-1';
        header.textContent = '';
        header.appendChild(input);
        input.focus();

        const finishEditing = () => {
            const newText = input.value.trim() || currentText;
            header.textContent = newText;
        };

        input.addEventListener('blur', finishEditing);
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                finishEditing();
            }
        });
    });
}

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

document.querySelectorAll('#tableHeader th').forEach(attachHeaderClickHandler);
document.querySelectorAll('#tableBody tr').forEach(row => {
    attachCellClickHandler(row);
    attachDeleteRowHandler(row);
});