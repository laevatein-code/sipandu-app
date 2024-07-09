document.getElementById('addRow').addEventListener('click', function() {
    const selectedTable = document.querySelector('.table-container.selected table tbody');
    if (!selectedTable) return;

    const newRow = document.createElement('tr');
    const numColumns = document.querySelector('.table-container.selected table thead th').length;

    for (let i = 0; i < numColumns; i++) {
        const newCell = document.createElement('td');
        newCell.className = 'p-2 border border-gray-300 editable-cell';
        if (i === 2) {
            newCell.innerHTML = '<select class="bg-white border border-gray-300 rounded px-2 py-1">' +
                                '<option value="Not Started">Not Started</option>' +
                                '<option value="In Progress">In Progress</option>' +
                                '<option value="Completed">Completed</option>';
        } else if (i === 3) {
            newCell.innerHTML = '<input type="date" class="bg-white border border-gray-300 rounded px-2 py-1">';
        } else if (i === 4) {
            newCell.innerHTML = '<button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button>';
        } else {
            newCell.textContent = `New Data`;
        }
        newRow.appendChild(newCell);
    }

    selectedTable.appendChild(newRow);
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

document.getElementById('addTable').addEventListener('click', function() {
    addNewTable();
});

function addColumn(type) {
    const selectedTable = document.querySelector('.table-container.selected table thead');
    const selectedTableBody = document.querySelector('.table-container.selected table tbody');

    const newHeader = document.createElement('th');
    newHeader.className = 'p-2 border border-gray-300 cursor-pointer text-left';
    newHeader.textContent = type;
    selectedTable.appendChild(newHeader);

    attachHeaderClickHandler(newHeader);

    for (let row of selectedTableBody.rows) {
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

function addNewTable() {
    const tablesContainer = document.getElementById('tablesContainer');

    const tableContainer = document.createElement('div');
    tableContainer.className = 'table-container bg-white border border-gray-300 rounded-md shadow p-4 space-y-4';

    const table = document.createElement('table');
    table.className = 'min-w-full bg-white border border-gray-300 rounded-md shadow';
    
    const tableHeader = document.createElement('thead');
    tableHeader.className = 'bg-gray-200';
    const headerRow = document.createElement('tr');
    headerRow.innerHTML = `
        <th class="p-2 border border-gray-300 cursor-pointer text-left">Task Name</th>
        <th class="p-2 border border-gray-300 cursor-pointer text-left">Owner</th>
        <th class="p-2 border border-gray-300 cursor-pointer text-left">Status</th>
        <th class="p-2 border border-gray-300 cursor-pointer text-left">Due Date</th>
        <th class="p-2 border border-gray-300 cursor-pointer text-left">Actions</th>
    `;
    tableHeader.appendChild(headerRow);
    table.appendChild(tableHeader);

    const tableBody = document.createElement('tbody');
    tableBody.innerHTML = `
        <tr>
            <td class="p-2 border border-gray-300 editable-cell">Task 1</td>
            <td class="p-2 border border-gray-300 editable-cell">Owner 1</td>
            <td class="p-2 border border-gray-300 editable-cell">
                <select class="bg-white border border-gray-300 rounded px-2 py-1">
                    <option value="Not Started">Not Started</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </td>
            <td class="p-2 border border-gray-300 editable-cell">
                <input type="date" class="bg-white border border-gray-300 rounded px-2 py-1">
            </td>
            <td class="p-2 border border-gray-300 text-center">
                <button class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700 delete-row">Delete</button>
            </td>
        </tr>
    `;
    table.appendChild(tableBody);

    tableContainer.appendChild(table);

    tablesContainer.appendChild(tableContainer);

    tableContainer.addEventListener('click', function() {
        document.querySelectorAll('.table-container').forEach(tc => tc.classList.remove('selected'));
        tableContainer.classList.add('selected');
    });

    attachHeaderClickHandler(headerRow);
    attachCellClickHandler(tableBody);
    attachDeleteRowHandler(tableBody);
}

document.querySelectorAll('.table-container').forEach(tc => {
    tc.addEventListener('click', function() {
        document.querySelectorAll('.table-container').forEach(tc => tc.classList.remove('selected'));
        tc.classList.add('selected');
    });
});

document.querySelectorAll('#tableHeader th').forEach(attachHeaderClickHandler);
document.querySelectorAll('#tableBody tr').forEach(row => {
    attachCellClickHandler(row);
    attachDeleteRowHandler(row);
});
