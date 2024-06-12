import "./bootstrap";
// Core Js
import jQuery from "jquery";
window.$ = jQuery;
window.jQuery = jQuery;
// window.$ = window.jQuery = jQuery.noConflict(true);
// console.log('jQuery version:', $.fn.jquery);

import "tw-elements";

import SimpleBar from "simplebar";
window.SimpleBar = SimpleBar;
import "simplebar/dist/simplebar.css";

// animate css
import "animate.css";

// You will need a ResizeObserver polyfill for browsers that don't support it! (iOS Safari, Edge, ...)
import ResizeObserver from "resize-observer-polyfill";
window.ResizeObserver = ResizeObserver;

import leaflet from "leaflet";
window.leaflet = leaflet;

import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
window.Calendar = Calendar;
window.dayGridPlugin = dayGridPlugin;
window.timeGridPlugin = timeGridPlugin;
window.listPlugin = listPlugin;

import Cleave from "cleave.js";
window.Cleave = Cleave;

import * as Chart from "chart.js";
window.Chart = Chart;
import ApexCharts from "apexcharts";
window.ApexCharts = ApexCharts;

import "country-select-js";

// Drag and Drop for kenban
import dragula from "dragula/dist/dragula";
import "dragula/dist/dragula.css";
window.dragula = dragula;

// Icon
import "iconify-icon";

// SweetAlert
import Swal from "sweetalert2";
window.Swal = Swal;

// tooltip and popover
import tippy from "tippy.js";
import "tippy.js/dist/tippy.css";
window.tippy = tippy;

// DATA-TABLE
import DataTable from "datatables.net-dt";
window.DataTable = DataTable;

// OWL CAROUSEL
// import 'owl.carousel/dist/assets/owl.carousel.css';
// import 'owl.carousel';
import cleave from "cleave.js";
window.cleave = cleave;

// jQuery validation
import validate from "jquery-validation";
window.validate = validate;

import.meta.glob(["../images/**"]);

//debounce
const debounce = (func, delay = 400) => {
    let timeoutId;
    return function (...args) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(() => {
            func.apply(this, args);
        }, delay);
    };
};
window.debounce = debounce;

var list, currentPage, paginated, beforePage, totalPages;
const visiblePages = (curPage = 1) => {
    let pages = [];
    let total = Number(totalPages);
    let current = Number(curPage);
    if (total <= 6) {
        for (let i = 1; i <= total; i++) {
            pages.push(i);
        }
    } else {
        let threeMax = total - 2;
        if (current <= 3 || current >= threeMax) {
            for (let i = 1; i <= 3; i++) pages.push(i);
            if (current <= 3) {
                if (current == 3) {
                    pages.push(4);
                }
                pages.push("...");
            }
            if (current > 3 && current < threeMax) {
                if (!(current - 1 == 3)) {
                    if (!(current - 2 == 3)) pages.push("...");
                    pages.push(current - 1);
                }
                pages.push(current);
                if (!(current + 1 == threeMax)) {
                    pages.push(current + 1);
                    if (!(current + 2 == threeMax)) pages.push("...");
                }
            }
            if (current >= threeMax) {
                if (current == threeMax) {
                    pages.push("...");
                    pages.push(threeMax - 1);
                } else {
                    pages.push("...");
                }
            }
            for (let i = threeMax; i <= total; i++) pages.push(i);
        } else {
            let firstPart = current - 2;
            let lastPart = current + 2;
            // console.log({
            //     current,
            //     firstPart,
            //     lastPart
            // })
            pages.push("...");
            for (let i = firstPart; i <= lastPart; i++) pages.push(i);
            pages.push("...");
        }
    }
    // console.log(curPage, totalPages, pages)
    return pages;
};
const changePage = (before, node, index) => {
    let current = before;
    let lasted = visiblePages(before).length;
    // if (node < 1 || node > totalPages.value) return
    if (node == "...") {
        if (index == 1) {
            node = Math.ceil(current / 2);
        } else if (index == lasted) {
            let tempMid = current + 4;
            node = Math.ceil((current + tempMid) / 2);
        } else node = Math.ceil(totalPages / 2);
    }
    return node;
};
const attachEventListener = () => {
    list = document.getElementById("paginationList").querySelectorAll("li");
    list.forEach((node, index) => {
        node.addEventListener("click", async (e, aIndex) => {
            e.stopImmediatePropagation();
            e.preventDefault();
            currentPage = node.getAttribute("data-page");
            // console.log(currentPage)
            list.forEach((node) => {
                node.querySelector("a").classList.remove("p-active");
            });
            if (!beforePage) beforePage = 1;
            if (currentPage == "prev") {
                currentPage = beforePage - 1;
                if (currentPage == 0) return;
            } else if (currentPage == "next") {
                currentPage = beforePage + 1;
                if (beforePage == totalPages) return;
            } else {
                currentPage = changePage(beforePage, currentPage, index);
            }
            paginated = document.getElementById("showData").value;
            beforePage = currentPage;
            let html = await fetchForPagination(currentPage, paginated);
            targetView.innerHTML = html.html;
            generatePagination(currentPage);
            activatePagination("not first init");
            document.getElementById("currentPages").textContent =
                document.querySelector("tbody").rows.length;
        });
    });
};
const generatePagination = (curPage) => {
    const pagination = document.getElementById("paginationButton");
    pagination.innerHTML = "";
    let force = false;
    totalPages = Math.ceil(
        Number(document.getElementById("totalPages").textContent) /
            Number(document.getElementById("showData").value)
    );
    currentPage = curPage;
    if (curPage) {
        if (curPage > totalPages) {
            curPage = totalPages;
            force = true;
        }
    }
    const allPages = visiblePages(curPage);
    allPages.forEach((index) => {
        const li = document.createElement("li");
        const a = document.createElement("a");
        li.classList.add("inline-block", "li-pointer");
        li.setAttribute("data-page", index);
        a.textContent = index;
        a.classList.add(
            "flex",
            "items-center",
            "justify-center",
            "w-6",
            "h-6",
            "bg-slate-100",
            "dark:bg-slate-700",
            "dark:hover:bg-black-500",
            "text-slate-800",
            "dark:text-white",
            "rounded",
            "mx-1",
            "hover:bg-black-500",
            "hover:text-white",
            "text-sm",
            "font-Inter",
            "font-medium",
            "transition-all",
            "duration-300"
        );
        // if (index === 1) a.classList.add('p-active')
        li.appendChild(a);
        pagination.appendChild(li);
    });
    attachEventListener();
    if (force) {
        document
            .getElementById("paginationList")
            .querySelectorAll("li")
            .forEach((node) => {
                if (node.getAttribute("data-page") == Number(curPage))
                    node.click();
            });
    }
};
const activatePagination = (value) => {
    // console.log(value)
    list.forEach((node) => {
        if (value) {
            let nodes = node.getAttribute("data-page");
            if (nodes == currentPage) {
                node.querySelector("a").classList.add("p-active");
            }
        } else {
            if (node.getAttribute("data-page") == 1)
                node.querySelector("a").classList.add("p-active");
        }
    });
};
window.generatePagination = generatePagination;
window.activatePagination = activatePagination;

const formatNumber = (number) => {
    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
};
window.formatNumber = formatNumber;
