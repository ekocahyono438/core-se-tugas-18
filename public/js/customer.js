const API_URL = '/api/customers';

let currentPage = 1;
let currentSearch = '';

const customerTable = document.getElementById("customerTable");
const pagination = document.getElementById("pagination");
const searchInput = document.getElementById("searchCustomer");
const alertMessage = document.getElementById("alertMessage");

let customerModal = null;

document.addEventListener('DOMContentLoaded', function(){
    loadCustomers();
});

async function loadCustomers(page = 1){
    currentPage = page;

    customerTable.textContent = 'Loading data...';

    const params = new URLSearchParams({
        page:currentPage
    });

    try{
        const response = await fetch(`${API_URL}?${params}`);

        if(!response.ok){
            throw new Error("Gagal mengambil data Customer");
        }

        const result = await response.json();

        const customers = result.data.data;
        const paginationData = result.data;

        renderCustomers(customers, paginationData);
        renderPagination(paginationData);

    } catch (error){
        customerTable.textContent = '';

        const row = document.createElement('tr');
        const cell = document.createElement('td');

        cell.colSpan = 5;
        cell.className = 'text-center text-danger';
        cell.textContent = error.message;

        row.appendChild(cell);
        customerTable.appendChild(row);
    }
}

function renderCustomers(customers, paginationData){
    customerTable.textContent = '';

    if(customers.length === 0){
        const row = document.createElement('tr');
        const cell = document.createElement('td');

        cell.colSpan = 5;
        cell.className = 'text-center';
        cell.textContent = 'Data Customer tidak ditemukan';

        row.appendChild(cell);
        customerTable.appendChild(row);

        return;
    }

    customers.forEach((customer, index) => {
        const row = document.createElement('tr');

        const number = index + 1;

        const numberCell = document.createElement('td');
        numberCell.textContent = number;

        const nameCell = document.createElement('td');
        nameCell.textContent = customer.name;

        const emailCell = document.createElement('td');
        emailCell.textContent = customer.email;

        const cityCell = document.createElement('td');
        cityCell.textContent = customer.city;

        const actionCell = document.createElement('td');

        const detailButton = document.createElement('button');
        detailButton.className = 'btn btn-sm btn-info me-1';
        detailButton.textContent = 'Detail';
        detailButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 16 16"><path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/></svg> Detail';
        detailButton.title = 'Detail Customer';
        detailButton.addEventListener('click', () => {
            //showCustomer(customer.id);
        });

        actionCell.appendChild(detailButton);

         const editButton = document.createElement('button');
         editButton.className = 'btn btn-sm btn-warning me-1';
         editButton.textContent = 'edit';
         editButton.innerHTML ='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="vertical-align: -2px; margin-right: 4px;"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A.5.5 0 0 0 1.5 14h13a.5.5 0 0 0 0-1h-13a.5.5 0 0 0-.5.5z"/></svg> Edit';
         editButton.title = 'edit Customer';
         editButton.addEventListener('click', () => {
            //showCustomer(customer.id);
        });

        actionCell.appendChild(editButton);

         const deleteButton = document.createElement('button');
         deleteButton.className = 'btn btn-sm btn-danger me-1';
         deleteButton.textContent = 'delete';
         deleteButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="vertical-align: -2px; margin-right: 4px;"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/><path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1z"/></svg> Delete';
         deleteButton.title = 'delete Customer';
         deleteButton.addEventListener('click', () => {
            //showCustomer(customer.id);
        });

        actionCell.appendChild(deleteButton);

        row.append(
            numberCell,
            nameCell,
            emailCell,
            cityCell,
            actionCell
        );

        customerTable.appendChild(row);
    });
    
    
    
}

function renderPagination(paginationData){

}