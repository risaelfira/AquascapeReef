<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3KFP92VEH8"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-3KFP92VEH8');
</script>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    function scrollToSection(id) {
        document.getElementById(id).scrollIntoView({
            behavior: "smooth"
        });
    }

    function toggleDropdown() {
        const dropdown = document.getElementById("userDropdown");
        dropdown.classList.toggle("hidden");
    }

    function toggleDropdownMenu(id) {
        const dropdown = document.getElementById(id);
        const isHidden = dropdown.classList.contains("hidden");

        document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
        if (isHidden) dropdown.classList.remove('hidden');
    }

    document.addEventListener("click", function(event) {
        const isClickInside = event.target.closest(".relative");
        if (!isClickInside) {
            document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
            document.getElementById("userDropdown")?.classList.add("hidden");
        }
    });

    window.addEventListener('DOMContentLoaded', () => {
        if (window.location.hash === "#contact") {
            const section = document.getElementById("contact");
            if (section) {
                section.scrollIntoView({
                    behavior: "smooth"
                });
            }
        }
    });
</script>