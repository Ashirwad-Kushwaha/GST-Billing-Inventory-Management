# Laravel Invoice and Bill Generator

This is a Laravel-based web application for generating invoices and bills. It includes a rich text editor for filling out an application form, followed by a dynamic bill generation page. Users can input descriptions, rates, quantities, and the system will calculate totals, including GST (18%).

## Features

- **Rich Text Editor**: Integrated CKEditor for an application form that allows users to input formatted text.
- **Dynamic Invoice/Bill Generation**: The invoice page allows users to create detailed bills with descriptions, rates, quantities, and auto-calculated totals.
- **GST Calculation**: Automatically calculates GST (18%) and shows the grand total.
- **Responsive Design**: The application uses Bootstrap to ensure a responsive and user-friendly interface.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Node.js and npm
- MySQL or any other supported database

### Steps to Install

1. **Clone the repository**:
    ```bash
    git clone https://github.com/your-repo/laravel-invoice-generator.git
    ```

2. **Navigate to the project directory**:
    ```bash
    cd laravel-invoice-generator
    ```

3. **Install PHP dependencies**:
    ```bash
    composer install
    ```

4. **Install Node.js dependencies**:
    ```bash
    npm install && npm run dev
    ```

5. **Set up environment configuration**:
    ```bash
    cp .env.example .env
    ```
    Edit the `.env` file to configure your database:
    ```env
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Generate an application key**:
    ```bash
    php artisan key:generate
    ```

7. **Run database migrations**:
    ```bash
    php artisan migrate
    ```

8. **Start the application**:
    ```bash
    php artisan serve
    ```

9. **Access the application**:
    Open your browser and go to `http://127.0.0.1:8000`.

## Usage

### 1. Application Form
- The first page includes a form where users can input application details using a rich text editor (CKEditor).

### 2. Bill Generation
- The second page allows users to generate a detailed invoice. They can input descriptions, rates, and quantities for each line item, and the system will calculate the total amounts.

### Example Bill Layout

| Description                                  | Rate (₹)   | Quantity | Amount (₹)     |
|----------------------------------------------|------------|----------|----------------|
| **Website Development for E-Commerce Store** |            |          |                |
| - Backend Development                        | 2,50,000.00| 1.00     | ₹2,50,000.00   |
| - Frontend Design                            | 1,50,000.00| 1.00     | ₹1,50,000.00   |
| **SEO & Marketing**                          |            |          |                |
| - SEO Optimization for Website               | 50,000.00  | 1.00     | ₹50,000.00     |
| - Social Media Marketing (3 Months)          | 75,000.00  | 1.00     | ₹75,000.00     |
| **Content Creation**                         |            |          |                |
| - Blog Writing & Copywriting                 | 20,000.00  | 5.00     | ₹1,00,000.00   |
| **Hosting & Maintenance**                    |            |          |                |
| - Server Hosting & Support (1 Year)          | 25,000.00  | 1.00     | ₹25,000.00     |
| **Subtotal**                                 |            |          | ₹6,50,000.00   |
| **GST (18%)**                                |            |          | ₹1,17,000.00   |
| **Grand Total**                              |            |          | ₹7,67,000.00   |

## Technologies Used

- **Laravel**: Backend framework for handling business logic.
- **CKEditor**: Rich text editor for form input.
- **Bootstrap**: Front-end framework for building responsive layouts.
- **JavaScript**: For client-side validation and data manipulation.
- **MySQL**: Database for storing form and invoice data.

## Folder Structure

├── app │ ├── Http │ ├── Models ├── database │ ├── migrations ├── public ├── resources │ ├── views │ └── js └── routes └── web.php


## Customization

### 1. Rich Text Editor (CKEditor)
The rich text editor can be customized in the `resources/views/application.blade.php` file where CKEditor is initialized.

```javascript
CKEDITOR.replace('description');
```
### 2. Invoice Structure
The bill layout and functionality can be modified in the resources/views/invoice.blade.php file.

## Contribution
Feel free to contribute to this project by submitting issues or pull requests.

## License
This project is licensed under the MIT License. See the LICENSE file for details.


This version includes a different example bill layout for services such as website development, SEO, content creation, hosting, and maintenance. The bill includes descriptions, rates, quantities, and calculated amounts for each line item. The system also calculates the subtotal, GST (18%), and grand total.
