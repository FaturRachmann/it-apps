import { fontFamily } from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    darkMode: 'class', // Enable dark mode with class strategy
    theme: {
        extend: {
            fontFamily: {
                display: ['"DM Serif Display"', ...fontFamily.serif],
                heading: ['"Plus Jakarta Sans"', ...fontFamily.sans],
                body: ['"Outfit"', ...fontFamily.sans],
            },
            colors: {
                blue: {
                    50: '#f0f8ff',
                    100: '#e0f0ff',
                    200: '#bde4ff',
                    300: '#93c5fd',
                    400: '#3b82f6',
                    500: '#2563eb',
                    600: '#1d5fb4',
                    700: '#1e40af',
                    800: '#1a3a6e',
                    900: '#0f2240',
                    950: '#0a1628',
                },
                gray: {
                    50: '#f8fafc',
                    100: '#f1f5f9',
                    200: '#e2e8f0',
                    300: '#cbd5e1',
                    400: '#94a3b8',
                    500: '#64748b',
                    600: '#475569',
                    700: '#334155',
                    800: '#1e293b',
                    900: '#0f172a',
                },
                cyan: {
                    300: '#a5f3fc',
                    400: '#22d3ee',
                    500: '#06b6d4',
                },
                accent: '#00d4ff',
                'accent-soft': '#e0f7ff',
                success: '#10b981',
                warning: '#f59e0b',
                error: '#ef4444',
                info: '#3b82f6',
            },
            animation: {
                'fade-in': 'fadeIn 0.6s ease-out forwards',
                'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                'slide-in-left': 'slideInLeft 0.8s ease-out forwards',
                'slide-in-right': 'slideInRight 0.8s ease-out forwards',
                'blob': 'blob 7s infinite',
                'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'bounce-slow': 'bounce 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                'scale-in': 'scaleIn 0.5s ease-out forwards',
                'rotate-in': 'rotateIn 0.6s ease-out forwards',
            },
            keyframes: {
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                fadeInUp: {
                    '0%': { opacity: '0', transform: 'translateY(30px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                slideInLeft: {
                    '0%': { opacity: '0', transform: 'translateX(-50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                slideInRight: {
                    '0%': { opacity: '0', transform: 'translateX(50px)' },
                    '100%': { opacity: '1', transform: 'translateX(0)' },
                },
                blob: {
                    '0%, 100%': { transform: 'translate(0, 0) scale(1)' },
                    '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                    '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                },
                scaleIn: {
                    '0%': { opacity: '0', transform: 'scale(0.9)' },
                    '100%': { opacity: '1', transform: 'scale(1)' },
                },
                rotateIn: {
                    '0%': { opacity: '0', transform: 'rotate(-10deg)' },
                    '100%': { opacity: '1', transform: 'rotate(0)' },
                }
            },
            transitionDelay: {
                '0': '0ms',
                '100': '100ms',
                '150': '150ms',
                '200': '200ms',
                '300': '300ms',
                '500': '500ms',
                '700': '700ms',
                '1000': '1000ms',
                '2000': '2000ms',
                '4000': '4000ms',
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('flowbite/plugin')
    ],
};