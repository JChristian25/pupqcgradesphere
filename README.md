# PUPQC GradeSphere

**PUPQC GradeSphere** is a Laravel-based application designed to manage and streamline academic grading and performance tracking at PUPQC (Polytechnic University of the Philippines - Quezon City).

This guide provides step-by-step instructions for collaborators to contribute effectively to the project.

---

## 🛠️ Steps for Collaborators to Contribute

### **1. Fork the Repository**
1. Go to the [GitHub repository](https://github.com/your-username/pupqcgradesphere).
2. Click the **Fork** button in the top-right corner to create a copy of the repository under your GitHub account.

### **2. Clone Your Fork**
1. Open a terminal on your local machine.
2. Clone your forked repository using:
   ```bash
   git clone https://github.com/your-username/pupqcgradesphere.git
   cd pupqcgradesphere
   ```

### **3. Set Up the Project**
1. Install PHP dependencies:
   ```bash
   composer install
   ```
2. Install JavaScript dependencies:
   ```bash
   npm install
   ```
3. Copy the `.env.example` file to create your `.env` file:
   ```bash
   cp .env.example .env
   ```
4. Generate the application key:
   ```bash
   php artisan key:generate
   ```
5. Run database migrations:
   ```bash
   php artisan migrate
   ```
6. Start the local development server:
   ```bash
   php artisan serve
   ```

### **4. Create a New Branch**
1. Always create a new branch for your contributions:
   ```bash
   git checkout -b feature/your-feature-name
   ```
2. Name your branch descriptively, e.g., `feature/user-authentication` or `bugfix/fix-typo`.

### **5. Make Your Changes**
1. Implement the feature or fix the bug in your local environment.
2. Run tests to ensure your changes don’t break existing functionality:
   ```bash
   php artisan test
   ```

### **6. Commit Your Changes**
1. Stage your changes:
   ```bash
   git add .
   ```
2. Write a clear, concise commit message:
   ```bash
   git commit -m "Add feature: user authentication"
   ```

### **7. Push to Your Fork**
1. Push your branch to your forked repository:
   ```bash
   git push origin feature/your-feature-name
   ```

### **8. Create a Pull Request**
1. Go to the original [GitHub repository](https://github.com/your-username/pupqcgradesphere).
2. Click the **Pull Requests** tab, then click **New Pull Request**.
3. Select your branch and provide a detailed description of your changes.
4. Submit the pull request for review.

---

## 👥 Contribution Guidelines

- **Follow Coding Standards**: Use PSR-12 coding standards for PHP and adhere to Laravel conventions.
- **Write Descriptive Commit Messages**: Summarize your changes clearly.
- **Test Your Changes**: Ensure all changes are tested locally before submission.
- **Pull Latest Changes**: Before creating a pull request, sync your branch with the latest changes from the `main` branch:
  ```bash
  git pull origin main
  ```

---

## 📜 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

```
