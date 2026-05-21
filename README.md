# 🌐 Anand Doddi — Web3 & Smart Contract Security Portfolio

Welcome to the official repository for my professional blockchain developer portfolio. This project showcases my decentralized applications (DApps), smart contract audits, and key Web3 achievements using a modern, interactive dark-mode theme built with high-performance CSS and JavaScript.

---

## 🚀 Live Demo & Deployment
* **⚡ Live Demo**: [https://0xanandportfolio.vercel.app/](https://0xanandportfolio.vercel.app/) 🔗
* **GitHub Repository**: [0xAnandDev/0xanand-portfolio](https://github.com/0xAnandDev/0xanand-portfolio)
* **Hosting Platform**: Deployed on **Vercel** with support for Netlify or standard PHP/Apache hosting.

---

## 🛠️ Tech Stack & Architecture

This portfolio is hand-coded without bulky frameworks to ensure sub-second page loads, excellent SEO, and smooth performance:
* **Frontend**: HTML5, Vanilla CSS3 (Custom grids, interactive glassmorphism components), JavaScript (ES6+, jQuery, GSAP animations, Owl Carousel).
* **Animations**: GSAP (GreenSock), ScrollMagic, and AOS (Animate on Scroll) for high-end micro-animations.
* **Email Integration**: Integrated with **Web3Forms API** (for serverless hosting environments like Vercel) and dynamic DMARC-compliant PHP headers (for standard Apache setups).

---

## 💼 Featured Projects Showcase

The portfolio includes detailed case studies for my three major Web3 applications. Click on any card in the portfolio to view:

### 1. 🔍 Solvigil Security Scanner
* **Focus**: Static analysis scanner for Solidity contracts.
* **Key Features**: Auto-detects OWASP Top 10 vulnerabilities, compiles AST traversals, and generates downloadable audit summaries.
* **Engineering Challenge Solved**: Optimized Solidity AST processing loops to avoid browser freezing during deep library imports.

### 2. 💸 AagesLend Finance
* **Focus**: Decentralized lending and borrowing protocol.
* **Key Features**: Over-collateralized lending pools, real-time dynamic LTV calculation, and sub-100k gas optimization structures.
* **Engineering Challenge Solved**: Applied inline Yul assembly and packed storage slot variables to keep execution gas below 85,000.

### 3. 💳 DecentroPay
* **Focus**: Layer-2 Polygon payment gateway.
* **Key Features**: Real-time transaction confirmations, Polygonscan verification linkers, and gas relayer standards.
* **Engineering Challenge Solved**: Integrated dynamic gas fee estimation loops to safely recover and retry reverted transactions during network congestion.

---

## 🎓 Achievements & Certifications

The portfolio showcases official course completions with direct linkers to the PDF documents located under `images/Certifications/`:
* **J.P. Morgan** — Software Engineering Virtual Experience
* **Alchemy University** — Ethereum Bootcamp Certification
* **CryptoZombies** — Advanced Solidity Course
* **Tata Consultancy Services (TCS)** — Cybersecurity Certification
* **GeeksOfGurukul** — Blockchain Program Certification
* **Future Interns** — Software Development Internship

---

## ✉️ Contact Form Setup (Working Production Emails)

To ensure the contact form successfully delivers emails directly to your inbox without requiring a backend server:

### 1. Retrieve a Free API Key
Go to [Web3Forms](https://web3forms.com/) and register your email (`anand.doddi.dev@gmail.com`) to instantly receive your Access Key.

### 2. Configure the Key
Open [index.html](file:///c:/BlockchainProjects/Anand_Portfolio/index.html) and locate line 754:
```html
<input type="hidden" name="access_key" value="YOUR_WEB3FORMS_ACCESS_KEY_HERE">
```
Replace `YOUR_WEB3FORMS_ACCESS_KEY_HERE` with the Access Key you received.

### 3. Run and Deploy
* If the Access Key is present, the script automatically sends emails via AJAX to Web3Forms.
* If no key is configured (or left as default), the form gracefully triggers a simulated static sandbox send in the browser console for recruiters to test locally.

---

## 📦 Deployment Instructions

### Deploying to Vercel (Recommended)
1. Register/Log in to [Vercel](https://vercel.com) using your GitHub account.
2. Click **Add New** > **Project** and select `0xanand-portfolio`.
3. Vercel automatically detects the static repository framework. Leave settings at default.
4. Click **Deploy**. Your live link is generated in under a minute!
5. Pushing updates to the `main` branch of your GitHub repository will automatically trigger subsequent deployments.

### Local Development
To test the site locally:
```bash
# Serve static files locally
npx serve
```
Open `http://localhost:3000` to review animations and interactive components.
