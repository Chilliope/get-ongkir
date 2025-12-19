# Laravel RajaOngkir JNE Shipping Calculator

**Description:**

This Laravel project is used to calculate domestic shipping costs between districts in Indonesia using the **RajaOngkir API with JNE courier only**.  
Main features:

- Fetch province, city, and district data from RajaOngkir.  
- Calculate shipping costs for JNE courier only.  
- **Cache API results** in the database to save API quota and improve response speed.  
- Cache has a **7-day expiration**, after which data will be refreshed from the API.  
- Public repo is safe, **API key is stored in `.env`**, so each user must provide their own key.

---

## Main Features

1. **Calculate Cost (JNE)**
   - Input: `destination`, `weight`  
   - Output: Shipping cost, estimated delivery time, JNE service.  
   - Results are stored in the database with a 7-day TTL.

2. **Database Cache**
   - Shipping cost data is stored in the `shipping_costs` table.  
   - If data is still valid (not expired), the API will not be called.

3. **Public-Friendly**
   - API key is not included in the repo → users must add their own key in `.env`.

---

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/username/laravel-rajaongkir.git
    cd laravel-rajaongkir
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Copy `.env.example` to `.env` and set your RajaOngkir API key:
    ```env
    RAJAONGKIR_KEY=your_api_key_here
    ```

4. Generate application key:
    ```bash
    php artisan key:generate
    ```

5. Run migrations:
    ```bash
    php artisan migrate
    ```

6. Start the development server:
    ```bash
    php artisan serve
    ```

---

## Usage

- Endpoint to calculate JNE shipping cost:  


- Request body:

```json
{
  "destination": "114",  // District ID of destination
  "weight": 1000         // Package weight in grams (optional, default 1000)
}

{
    "meta": {
        "message": "Success Calculate Domestic Shipping cost",
        "code": 200,
        "status": "success"
    },
    "data": [
        {
            "name": "Jalur Nugraha Ekakurir (JNE)",
            "code": "jne",
            "service": "REG",
            "description": "Regular Service",
            "cost": 120000,
            "etd": "12 day"
        }
    ]
}
