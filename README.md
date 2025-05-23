RF231136

# 🛍️ Petunia Store - Tienda Online en Laravel

**Petunia Store** es una tienda online desarrollada en Laravel, donde los usuarios pueden ver productos agrupados por categorías, agregarlos al carrito, y simular una compra.

---

## 🚀 Funcionalidades principales

- Vista de productos categorizados
- Carrito de compras con:
  - Agregado de productos
  - Eliminación de productos
  - Vaciar carrito
- Alerta de éxito o error al interactuar con el carrito
- Validación de stock antes de agregar
- Modal con resumen del carrito
---

## 🛠️ Tecnologías utilizadas

- PHP
- Laravel
- Blade
- Tailwind CSS
- JavaScript (para modales y alertas)
- Session (para manejo del carrito)

---

## 📦 Instalación del proyecto

```bash
git clone https://github.com/bannle/dss-desafio3.git
cd dss-desafio3
composer install
cp .env.example .env
php artisan key:generate
```

**Configurar base de datos** en `.env`:

```env
DB_DATABASE=e_commerce
DB_USERNAME=root
DB_PASSWORD=
```

Correr las migraciones y seeds:

```bash
php artisan migrate --seed
```

---

## 🖼️ Compilar assets

```bash
npm install
npm run dev
```

---

## ▶️ Ejecutar el servidor

```bash
php artisan serve
```

Abrir en el navegador: [http://localhost:8000](http://localhost:8000)

---

## 📄 Licencia

Este proyecto es solo con fines educativos.
