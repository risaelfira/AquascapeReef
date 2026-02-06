<?php
include "_utils.php";
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (!isset($_SESSION['user'])) {
  header("Location: index?not_logged_in=1#login-section");
  exit();
}

  if (isset($_SESSION['user']['name']) && strpos($_SESSION['user']['name'], '=') !== false) {
    $_SESSION['user']['name'] = decrypt($_SESSION['user']['name']);
  }
  if (isset($_SESSION['user']['email']) && strpos($_SESSION['user']['email'], '=') !== false) {
    $_SESSION['user']['email'] = decrypt($_SESSION['user']['email']);
  }
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AquascapeReef - Jenis Terumbu Karang</title>
  <?php include '_layout_headscript.php' ?>
</head>

<body id="top" class="bg-gray-100 text-gray-800 font-sans">
  <!-- Navbar -->
  <?php include '_layout_navbar.php' ?>


  <!-- Header -->
  <section class="pt-28 relative w-full h-[400px] bg-cover bg-center flex items-center justify-center text-white"
    style="background-image: url('https://www.biorock-indonesia.com/wp-content/uploads/2022/03/Biorock-Blogpost.jpeg');">
    <div class="absolute inset-0 bg-black/50"></div>
    <h1 class="text-4xl md:text-5xl font-bold relative z-10 text-center px-4 drop-shadow-lg">
      Terumbu Karang Indonesia
    </h1>
    <p class="absolute bottom-2 left-4 text-xs text-white z-10">
      Sumber gambar: <a href="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.biorock-indonesia.com%2F4-hal-menarik-tentang-terumbu-karang-di-indonesia%2F&psig=AOvVaw1KSnUdiMOHdi_uVFnIi_In&ust=1752327129364000&source=images&cd=vfe&opi=89978449&ved=0CBQQjRxqFwoTCPDx_tD1tI4DFQAAAAAdAAAAABAE" target="_blank" class="underline hover:text-blue-300">biorock-indonesia.com</a>
    </p>
  </section>

  <!-- Opening Section -->
  <section id="opening" class="py-16 bg-white scroll-mt-32">
    <div class="max-w-4xl mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-blue-700">Menyelami Keindahan dan Keajaiban Terumbu Karang Indonesia</h2>
      <p class="text-lg leading-relaxed mb-10">
        Selamat datang di jantung Segitiga Terumbu Karang, sebuah mahkota biru yang disematkan pada Nusantara. Indonesia, dengan kekayaan lautnya yang luar biasa, adalah rumah bagi lebih dari 500 spesies karang keras (Scleractinia), menjadikannya pusat keanekaragaman hayati terumbu karang dunia.
      </p>
      <p class="text-lg leading-relaxed mb-6">
        Mari kita selami lebih dalam dunia yang penuh warna ini dan temukan pesona serta fakta menarik dari beberapa jenis terumbu karang paling menonjol yang menghiasi lautan Indonesia.
      </p>
    </div>
  </section>

  <!-- Jenis Karang Section -->
  <section id="jenis karang" class="py-16 bg-white scroll-mt-32">
    <div class="max-w-7xl mx-auto px-4">

      <!-- Jenis Karang 1 -->
      <div class="relative grid md:grid-cols-[41%_auto] grid-cols-1 gap-6 items-center overflow-hidden shadow-xl rounded-lg bg-gradient-to-r from-blue-500 to-teal-300 mb-14">
        <figure class="w-full h-full">
          <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMTEhUTExMWFRUXFRcVFxUYFRgVFhUYFRcXGBUXFRUYHiggGBolGxUVITIhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OFxAQFy0dHh0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIAOEA4QMBEQACEQEDEQH/xAAbAAADAQEBAQEAAAAAAAAAAAADBAUCBgEAB//EAEAQAAEDAgQDBQUGBQMDBQAAAAEAAhEDIQQSMUEFUWETInGBkQYyobHwFEJSwdHxFTNicuEjgsI0c6IWQ1Oy0v/EABoBAAIDAQEAAAAAAAAAAAAAAAIDAQQFAAb/xAA1EQACAgEEAQEFBwQCAgMAAAAAAQIRAwQSITFBURMiYXGBBTKRobHB8BQz0eE08UJSFSND/9oADAMBAAIRAxEAPwDjqlMFMTM1ppgjh1LOR8aaiwnwAe2FzRyZj7QpTOaTPHVZUuVg7aMOpgqLBdgzRUkKzdGEtjvAw0wpiLkAquRC1Z5RehJvgYebIhkUJvYhaHroC5iiiG6F3UzKhphqao2xhUpMhyQ9hwjQLdlbDtlFYNDPZhc2SrPHMCiw0gVVoXWEkIYhgXNWSnRPq0ktoNMX7EqKDTHsFh7pkUC5HQ4PC2T0hLmNPp2RHKQvkK7kLcBbTVRFZ2eGmu7IXAMgIkjmI1tVIDb8AewXJIhtmXUiFDQUZepukVCJfJiq6FLIVAA+6W+x3g2ahRJCJv0BveiboGMbZ4xyCx2xDtFpKNKyUqNdgppB3wAqUYUUC2CcxQQgjaaJHMYpMXMlFLB0XvMMY5xGwBMeMaJcppLlktqPbHXcMxH/AMT/AEQe1h/7HLLD1E8Vh6zfepVB1LHR6xC5Ti+mGpwfTJ76pTEHaYu+qpsnhmRddZxptJcgrKGDYJTEBJl2hEJpXYR7URFtA+yXUduEHQqXB3J4ApRwHEI0A2TnG6hs6CTG6MKLDcDVamCFKdgONMRdThSgW6AvbKKrFtuxR4ultD4ttH0qEyGjx4UthY07oLhmylp8lhpUWsHRCYmKaoYqYdHYNiuIpIWyLsQqtUMNI8pG6hMlpFPD0pRAXXJ3fBiynQY1ggkZnH8TjMyekR00WXLKpzYLx7nY2K4OqLb5RLw8BWFuy5wbVguDqqIXtTwhlSm6qABUaM2YffA94O5mLg9I3TcMmmkyINxdeDhX4cq6P3AzSKFoYpHwspTCsPQqXRJnNorYWsjTFNDvbJiYFH3bqdxFEx5hVKoLs+DlFkUeVBIRLkVJUwBoIq4OTpmHCEDQ9OzPboU6CcbPG3RRYmcT1+HsmplZpkrENgoJDsb8AmpaY2SNOauZ0GrD4cIR6dlzBvUpgSQ4UabEsBXZKlckLsm16a6hqRihRuhbohsvUKTmND2tzGLAAk+Q3MaeKqZ9QlcPJm5dVGU3h65q/AXAVKjGNY4FpbBgiDe5nzlZq7bNXDkhLmLtP9ilRxp+vronwyMsUmMtx0fX1yTPbVwC4J9g+I8Q/wBCpFyWwegc5oJ9HIoZFKaorzgk1Zz1GiCtOIt2mZrYPoio5Mm4nDkbIWhqkBa0rkiUxyhUhEmc+Qjq6i2SkefalO9HbWfEylir5MhpQ1bDvgPTajjwJnTDBoRti0hPGJbY1KiW4EFRXkaprocwolcgZDpZZEmJaJmNw6l8grgninCFxoJTvhhAJXHJ+gxSpIWh8ZFPD04QtBXZRpBEmJkjTqaaiEI1qK5sOyjwjDtpD7TVDeznswDclxIGbLoWid/yVDU5edq7K2VLI1i89/gVv4/RpvECMw1A0AuLbCx9FQ3xu6Ax6BNuTM8VxzHXEaTt8h5IZZIvodiwuDpHvDMRRc3K4X0OxtGh8vmmY5xapjp48ie6LMcQwzWFoY6ZB8Z2n0KVOST4Chlm09w7wfAHKXFoc1wLSwwZbex8bX+SiNqn0UNTkcmkvD7ObwepFxBIg6iNj1W/B2ky5VqymaQhN4Apk/EYVc0TZOq4eFD4DTsXLVA1GHAqKsJcAuwKjaTuQ6AoK6CAKAgjXI0xckEUsBX5BVKMoEgm6E6uFTUhd8nzaMJbQ2LvsaahqgrTPqlLMiQmaEq2DTBLB0cJdC0gotofpYVC0NUhttFLaGKQdllyIbs0SiTBQtUbdc5UrR0p0m0rCmmHU3UzJbMxO4h1vGG/QWRqMrtsxp6jL7RSbpr4evBIpYM/aadOHVCRLsgJsNSBFwNz4+CVD3scmuDXx555dPOUajzSv+dnV43hAZTnK45ARbugCSZJNgL/AEFXcZKilhzZlLmXfdqzlKdRwdofr/M+qNpNXZvpranZ0nDKGekSZL2gEX1Goj1FtbIH5MzUZnGfHTDO4u6k/s7OI2G03MkaLozmvHAEpw9lvceP50Tcc8NqPNy5zjUdHuszuLo+O63NLNyir4S4+YGizzzU5VFdJeXXkaw1aVeRfcaDVAFIprkm4piFhoR7G65IOw4wwhHXBCbbMdioCF3PEpItJo8c/quoNMzTqGVyYEqY9RcpsGgmZcmQ1wDqIrF+QZYuYxGIQNBthqZRLgW1Zs0wisS0fNoqAegwbChho+L0tsakegqEQ0bhTZFMG7KCM/uyM0aloPeg84lBKVJ12Qmm6T5LbMRhCMzGsy7CCdpiCsfJmq77K89I7ufZyj8UKGLD6Vpa4c7WkRsJg+SiEnLE38S5pYuWOW7q+DruG8azubbVwB311VbJnl1QvLijBWkc3QaA64uDcehj4n0XTdcjm7imnwdPhOLU3NGbKCNtAPCNuiZHKmqfDE5NNatETCU6LMRUIdmZmkEuJ2BPeBkwZHkolkpr0Fzg8uOpcUY9q3ZHsFP+U9mYO1l2Yh7Q7f7p59+61tDUlbdsDRaXHFuTdtfHoWwLitJGk2VmBSKbQCvSldRFgOxRJEnxEKeg0rMSFFhbTm31rlV7BXJ8K0qEwnwGpORJMW2mMsxAChugkrQZuKClMhwNdqiFOLPS9C2EkeyFNnNBGQpsC2jcqQXyEaoYJ68oWyUgD3IGORltaENh0mO4Qh1r6SYuI+il5JuKso6ueXFFyik19b/wTvaGGsIvLgcsGxIkkem6orK5yS9OynoJylk3ej5+FkfhGIcGAdPr5peognKzczNOTQPG1v8AWnmI8IN0eOH/ANdDcEUsVLo7XgeCJYC17CZuRBiBDoPS3nGxlZ2VVL5mHqM03OtrS+P+PyFuOuykQ0tkkaHRtozHXc26bQScYuV+g7Q43zufHFc/t4JbA5+lhufOPnKJ1Fcjs+pji47foe1qUNLs1gQOp0/U+hUx5fRR9s8jUK5ptjuO4g6rTp047rCXA73ER4QtLQYZY4uUn318i7pYOMU32zWDpwtJMstlWnojTAaPHI0zqF6pC5sOMWLOdKFOxyVGMqI45KpqUhorxd8Gqa5LkJsMXpqXAtN2CqPSposQl6njcSlptDGkN0cRKJOxMkkNitZECgJroG6GUmg9GrKJcipKhymjFtBmlC2DQSELZyRh9LdLySqLa7InkpNR5fobZwerUGdoAbYgkwDbbcqotZBQVvkVj1kIY1ubb8ihxr8KSx7ZzltwQdM12nzPmEGWSyxUou1yPShqoKUXwgGNxjaoOY5p0tEco5FVY8O65K0sex3FJV+ZD4dofGPjH5J+Vcmhkdy+iPcXSBMkn99fn8F0JUqHYZ+Edr7L8ZZ2QbYObYyAJ6hInFJ+8itn07cnLwxj2tx7ThjcF5qMLQ28QHybdLea5ODe1C8GLbPnhUSPZ+gD74EyRc7QIaRodPiEnLcnUSlrsTyO8T4r+P1Lr+EUrNHecBIBgt02G7tfXW67ApbuX8ygoahfV8+Pz/iI1OkF6JHoLGWGFLYSVjDXqUzqPHPRWEkAfdSglwCcESJs+lEccziKBnzSmVU+QYprqGJWehilMho2KCnghtroC6gh2E+0dG6TIXbaI32MNXHJnnZqGrD3UN4WjC5KiG7Hmhc2A0EaoBoKCoJSGG4mkwCYdUJNtQwbSNydb2hZWsyu6S6K2ogm4tr6hncRJEzssueVy4qiFhi+kcz7RYntKRO7SCDykgH68Vc0lxe3w/1LGnwPDmtfdl+pKouMeadJKyMqW510VsJw4MYxxEuM5hqC1xIBb5OaP9yXlm3aXBTy6qU5SinSVV80vP4Ng+I4INp5iTrO1v6TubH1CDFlbnS/nxHaTVSlm2pfB/5/H9SXhXw7x/b8wrE42jZndcFpxlrTNu87ykQfmqiVNoyN7lNp81SBYbGFjrHyRSg2uCw4NJPaW+F8czvhjO+Lh2wJ3A5/DXkiqSq/JV1iWGG5vl9L9w1SiR9W9VqY8yk6XS8iNNrIN7bpJdt8tnjGqwaidhg1SiUz5wRIJAwxEkc2eFqYqOVg4C4Lkk4inJSmVkgHZgKLGrlGSwKTjYhdZFHmUKUwHFnraS6wGjXYrmFF0fBqGwg1JyiyUhhhXWdQVpUWC0bBUNkURON0XU3ds33TAf8A0nQO8NB+6q58Kkh8Uskdr+gXB40uaGi50AAlxJMRa5N4WTPFUuhHsljdtfNjH8KqMdL8hZBzs3E6iNDBtr8kUskUqVqRVz66GWDhFNNPh+HXxEOJvaAwMABz3tYSRy2h3wCPBbbcnxR2jhKc3vfFHcUhSa002NhgIDdXEjUkk7mVEo3yyvl0inK32znPazh7QGvaTd8FpM7Og20gj/y9ZxOK4Rc0NY2410u/1I/DsDmnWbEcibkA8rAeqnLlqh2r1fs6rp9+q66KYoNcG2INhA1MD6KrKUrfky1qMkW6dr1fjk5/FyHlhb3gYIty5jxlX4qld8G/impY1JPhnSez2RjRaZPedMG/LkFRztylT4SMvV6f2snvl8kdFiqQNJz2mzSJB1GYxY+JHlKt6KS37SnptFCOW3yvQQoiVro13wuBtoCYkAm2wdRsqUhyYGpZFVdBLnsXc9cGjGddZ1CGcFLTENGHMlTSIboEWLjkzBCgNM8hRRF32MMKmwWj0uXWclQMhcyUFYxCEkMNC45hGlRZ1WEaVxFUDx1DtKbmTGYRMT8ELVqiYPa0yV7JVWUMS9lSxDXNa7SCXNGYDmWE32krP1MWlZGshPLj906l+NokyG0+UkZjb+6yoSnFeLZnxw7IbfHoRvak0Sxpa0NcLkgQCYIcAP8AaPRTptzk349A9Hjmstp2umvTyiZw/jtQNyl20dbAx8k/Ji9OjSzYE3aRrH1i9ocb6m/lbxu71QYoKMmirpltyyT+A77L4N1XM4ugTEDe1ze4EwPIKM6jxFEfaCg6jVuuzqvsFMW0cd5ExvHK/wCyXHHTSMf+mlV7uLOB4lw99Ku9jpMOMv8AxTcHoSL/AKq5uVdm/hzQ2JJrhdG24sstcRtvdIeLeKb9pzFl/DYip2eV1gTmI3tpPqTCv6XSLF7z7f5AwgoNu7bNsqQrvQ3sYFdTdEqBs1ZTE7CUa7MVNESJqmT6pXUHYOVx1kt1UhLaoWuQ1CsuTIcBzKFItJ+TDqSiyaPBTC6yKYOoFDVjImCVyOdIKxq5nIYYxA2GkahRZDSNBSgWzbQpAbDAKHwC5USOP4BtQF7TFVgBsbub+E/GEnJKL48hY9RsaT6ZzuFx7xF/Xp+6qzwxfguzxwafAXH44uyA7ddbb/XzXY8aSdEYMMYW0uz7hjZcJE3HwIUZeuAdS2oNp00n+h0Rw5a19soaA4AiZ6fH4BUqt3Z595VKcXdt8Pn8xT7WaL8zHGTct5Hr6/UFGob1yuvJq6S8sdslwun6lbC+04cQSyXDr3T4oXCcV2dl0u1Np8CWLqOq/wCp3nE1HOdbUxIHxHohXuyafp/2ZrvHNqVJtfvy/wDArgWtFTMXB1QmY1DG7xG+ngPVXMc1GqVJeSw5tQSqox8+WWqvdA5lX8eXdylwdp87zN0qS8gO0TGXkgrHSoGJIYY6EyJzdhHvsmroAQrVAubJF86gIUxdJS1aEJ0xIOISmmhyaaGKWJUpnNWEbjELYW019oXIU0etfKNHWgzWLgWwjQhZKCsKUxhtEkC2fKaAfJthXWBJpK2e4h4ynqDB6qtmzxSaKUtVBtxStHI4vF1DWzCxcQw9DYGOlp80q4yW599mnGOKUFfNK/8AsQ4hSy1XZbj3rbTqPVFB7opsfjmnBOwjsFVLc4bYB17R3RePrY8ioUori+wY6nGntcuePzOg9jaTBUD6oFwcgcJExZxB849dgq+eVcCNVk33CPNdnc18jyMwsB7oGpnUKo4pp0YssF9cHG+2WHFPsy2AxwfDIgtIy5jrvmHx8rGBd+vBqfZsNu622+OSPgGNnvaTcc+nqUeRtdFjUzmqUfPn0+J1vCMQwQMvdmLHQKg1btvkys2ljl96V3X4lDEBveygNblkEbFpG2l9Od9U6LcY8Oir7GMbfb+PRG4lIeWzIGm1iAfrwWvgdwTrs2dPFKCaVN9ijHGU0f2OMeiO66C9tCJM4Ur4tFYSROqYqShcgkjP2jqu3E7Sq9spqZTkqFKuClc1YMZ0xCvQIS3Eap+p7hsBWqe5TcesQPUpTyRXbDeaK8lfDeztX7xaPOfkg/qYLpWKllvpD38Cc0SCHRtopjqYt1VC97umhQU0+w7PQxc0SnTPCga5Gp8GgVyQDZ8VJCN0goo5tNcg8Zhi9pbngDWeunjvtsszVQhCSl5M7LDHgayJW34OaxnDnAktMkX5G297KMeVVTLmDVwaSkqsNwThBrOGaGAAucR3nOaCB7ukklo13RzyVwuSc2dQtRdr8Ev3OnxfCiaZYGEB4t4mQdPds4/FUZZXCVvwYq1Gyam3bX8XzIfF5a0TllhAmwcY8NBeYnQaXTMKUm/iav2fJPI2rqSv4fn+pil7RVoyh20eX1CKWniaUsGPugWKc+sRUe7NENBJ92J0HmVMWoLakV3k9lcEqfdV+45/C+7LGwSwRfeb5upBH1oqOa5U35M5az36m7Sbv/XwJTMe9hiDmBiND6KxLBF9mwoY5Rtdd3/s6HCPr1Gw/uskG1i8i4BP4RyG/giw4YPlu0UlLDfHn1Pa60FwqRaSFDUUkpB6TkSOYwGypSFtsRxbFLJiyTWCXJD4sDnKGxh0dKpdOTKrVjLHo0xLgjLarKbm1HgFoOh+CRqW1jbRyx7uCu7HF1xobhZu60nQePHBceTVOqg3ux1JFDDNO66bcaZWyteCBXpw4jkSteDuKYKdqzGVEcZyLiU2etpriLbNOaoZ10KYnHtpwdb3G4HMDdJnlUXQUE5ukc5jOIPqVsrHauyjYGfdSJQU+WWvYRcKkj6ljX6OYQb2i5DdY8IKrzwJdMpZNNBO4vj9GG4HjxRq1A5sdo1sHTLBNz0uD5BHNXBVzQ7JgjmxRSf3XydeOJZWtbnBMe845nTfSdu8fVUp88eDO9gpNtwujnvbENf2b2EFwnNlFspjvW6s8LhP0zpyXh/qW/s+Xs5yi+E+vmvH1vog0MO4wCMsib2tIgzysnykkrXJfnnhTad16ep1HBMDSAy5c1rud5WaNvmqk5ub54MfLmyZZq3Xol+/qX8Hwtou0nLy1MnnzH7JLi4zsRnw77fT9TkPaDhPZVWOa4ltTM693AtIzyd/eB8+iuxnug7XRo6bM5YXGSXu8ccJ+hd4fhzlmXO8pInZK001u8L9DG9so5Fwl83S+f8AGLV6fl0W4sVq07R6CE1KKaaa9UJ1Agaa7DSCUHIboNq0PsRJiWhfGtsisGK5IOJ1QtNj4tIXylDQe5HSAJ9FdP1NhC0TQrxuoBRdM3FvEXCDJW1pkw4mhrg/GA+mAWw7KBOxhY2Wbh7vgCeHbK0+CnSrJE5tJMbwiphMbIII5IXmcl10Iy41VoDxDCNLS9huJJHNaGm1D4i+injcoSqXT/Ijhy0ky00bRWQkZzoGxij6nmcwTGmp2HjyQ7vB1JPkk8Ww9N/eqEjKLEfnzS51dsbGfs/PZI4NSZVqFtxDZFjqDrI0jrzSJ3CO4DWaieOClH1KGLpve+wBce8I0I3gm2w+SryyRk9z89/MovLD7z4T7+DIWNrGe8DIsOumY9VYhFVwaengkri++/2PqGIJIFybAAfAALpQHySSbfR1jeGkU8pE523JiWuIaHNttEwPHxWfkyVJP0/lnm8mpvJd04v6NctP5iPF202RBzVMuoNgCTEDxBv08EeDfL5FnR+0naaqN+n8/AWw/Fy0yD5Xv56n1TXhL8dJHyvr/OEXaHtRTDbhwPIIHjn0KyaN3wzFfHipUDiBawb+G9x4nmP0SW5oo7JtVdJ/mWc8UnObAhoOkmcwEdZmFa0eOMs6Ulaf+BWPS45ZkpqxbCYGpW7xsN3OsLchut7UavT6ZKN/RGtKeLAtsV9Ee4vgjgJaQ7nsR18FTh9pYcjaktopayKvcqJ7sEWySNPj4I24Ta2DIazFNqMXyw9JqhKhsmaq0pCYhTbJuIwaKkyG2hf7Cu2ojeyt2cKaoJMw4KGMi7Pjhg5pLiMukbz+izNbdxp0Z+t3qa29/kS6FPI8jQTZUMnKss6fI5KpPlHb8Faw08zokyPJJinO7AyqakFrsaxx/CRIjkkTk4JryEm3DjliWIECxMOsL7clOmytTTl1ZQy6qcWt0eEIdjC9FjzRk6RYxauOWW2KPiE9lpcDOFotEF9ybtBBIiSJdG0jTpdZ2q1TjLZHvyypqNRNPbj78/6HW1HtBLnRcZcthBG3+Fmwm5Sb7IUVKKaTv4k/j3BhiKRfRAFRolzdBUHh+LrurH9Q4OpPj9DlklCSUuV+aOJ4G19Ou0sIGaBlIkFpcJ0NiNlblkTi01ZZ1DhmxuEl15XhnU40BzRkytcDfa+/1cqhGLvkyMWNwk99yRyfGeHuAzzmEm991ew5FddG3o9VBvZW1jfsO0dq9x1DCG2kgkbctdeiLO3SQf2j9xJ9XydpgW02sIe91uZtfSbXgyszNCV8Lv8AIyc+F5Wmkv8Aole1bKX2V7nRmD2ik6IJJcJA3jsw8kc2jcKzpU4vb+Jb0MXHIox6rk4ehTLyQIECT4dPQ+iuyajTfk1cmRY0r8jOCwZcJm+zRaepJ0S8mRRdVwV82qUHVceo/haNUvLW2ymC4zAjW+6VOMVDcxO2G1Tfnr/R23DQBTDc2YnU6DyH+Vm+1bb5cSrLC5Nu6Q92n7cyqTcnLu2FHGoIUq4og9dwrsGmtrOnji1T8imOYIDu07pmGxuNQea9L9lv3NkIXXbsHTx9nLbDH82ApK5nx07L7QcKumLaPH0wjTAabMdkFNkUzLlLdBUwFQhKbGQTRK4liQC1oMPOnI9FV1GOMo8+Bs4Jxcn0gzMK4953dI16rGnJRe1eTGeqUJe4rs+4binMeWg+F9ZU5I+6pLhm7SnjUq8HT1MScrDqRKz3crvsqQStp8II3iAcwtcJkFM9pxVFbUYIdeorkZkPeM63+Sv/AGflcZ7fDE4cTxTpJUxVbZeZQoY4CNBDQL9APnf4rF1EXHNLd5KEsbjkcquydjMcXukn/H6LopRRcgrVlHhmLA0N4Py5fWip6mdqkV9RwjiOPlzX52iwdLTGhBmxGy0NLTjTfNDNClJbW+T1vHQRcba6/BM9lNcJjJ6B23F38wFfiGdjmgWjXy+v3XRxbZJvsiGl9lJSbt+hM4RjnUny0wfnzB6forOWO5GplgpqmuDpf/ULC27TO/JU3jm+DPejd2mL4uoMVlzEsY2TEWvrE6uKiLliulbYrdPSt7UpN/zn4BsFg2sOVrZbJs65JNpBGlpHmonKUluf5egnLknkjub5+HSXoVKfAADOgJ0aY3sJN0nfJ9/5M2WvfC7fxQjimU3EspkgaFsZRrciw2nZMlkdJy5ouY82WKUsnKXKff0Oh4bTysgR0jT81T2ubb9RcNZB5E5Or8f5M1sflMjX62SFFt2uKNR7atvgkYziocdVZjgfbE5IZOXVLwHGNYcOGG7+0zDoIg/kvQfYsckckm17tfiO0scn3pH1F62dRFNFmSG2FZ1UxDYQIkiD7KEVIi2IGULTYdpcAHtJKVKLSs55FFWQeIk5szjdvujLZU5ym+GuCVleRbVHh9uzpuBcTovpjMZeLZToI0PVZmXEoctGdL7OcZNtWjOJwrTVa8QAddgke0bi0W8WR4sbiufTyVaTDlMbQWxeeaq1f7lWeXJKmlT5TsXpjvmxbY2Pmi6SsOdxxxcnbsE2mST4LQ0G1Sti46iDy9mg1btcWi9diXGcJUe1vZmHAzFhNueyTlgp1YzFJRfvLhnN0cZVY8tqSCNjr9fW6p5MMa4LE4Q23Hot0q78tg3TSZMGJ8bfmqEoRsxpRw7+W0r7+JL49WYaWgDswiNo1+CtaVSU/hRa0kJ+3bTbjXb8+hzbXELRaTNdoYDobqPDfofBA1yVm7nSX1A4eg5+aB7ozHwRSko1fkdPLGFbvLobo4UuIaDynoIHx0SpTSVtCZ6hRTlQ92+QlpBBHdk7iLGBzt6pLhu5XJV9nvSknafPyf1HuH8TaO6+3WQUMotK0rAy6VtOUPwLOH4u1hIDp0Ib1AsSdQLDxhV5JtOlRQy6Zupyj0Bw9JrjpE+YP6Lowe2rBucYq+Uh/E41zG0w4xmzC+vdi4J8fgk+zlG1+h2k02Ke6SVtfzo+7tQd0iY11g7fFJhjm5fdbAz48ine1tehHxfCbguJmIIFm239F6HT6ZbE5eTa0nGP4PlX2vgDYMtlp4XsaSLV8FHDFXWtyEzHWOVDJGmJas1nulp8nJUglkZFMndsoi7DePkC7ENVlQTXR3s2JY9gqMLQYOxUT06nCuhkVtZDwdJ9OqAQZmOh81h6nGoqUZeBuTLBQdvpHT4yqSyNxqsjGve+BT0s4ydrpjvC+NQ0NjYBdKLg2+w8+mtuQ7iq5dFrke90E6qry3bZlZ4PZafmqFhP3STe9tAn4JJTTfCKai4TUsipG2kbardhn3ukaENRuaiiH7QvqS0teWtn7tjPiL+qHJPnu0aeJppppM511WHBxJJBF9TfXXXzQpWn8R8lui412vp/ks4Ti9FgblzTBDrcyIjbRVMmmnIy8uizZE1Jqk1QnxCn2lwIJP1PVMxPZ30hunm8TpvhCD8PkPunNNpuCHDS1uSsb9y74LXtHlXfHmvFfmbxbmgQ45n6kTbwGVRBNvjhC8UJN3FUvXz+ZZ4dwwMOUXJH+oPEOkAdMyrZsrl9OijqdQ5xbkqSfD/nrRRpcMayDuTA3uLAnmq0sk3wUnqJztehy3FmPbWqB4hwdeJgAgFsHllLY6LTxpbI0b+mcPZR2vivPfx+ornJ0teJ/wAoqS7HppDuA7sn6/RJy80VtR79Jfz9yhheKvae63N0P6pe2ly6ETwY0qk6CcSxFSr33hhcBlawmAwE2t5kyeanE0pUub8k6ZwjNRxp15ddnRcEoZaQDi1x5tA+Y1WtgjUa/Qsy5fQTFMCdwcmyPXpQVy7CTN0DdamJXE5qyjTKqaiHlCmjTqappHI9ylFRJHxZTlhDj3YjR1WnhwJobTa4HGYim1sPu0nzCy/tbFLGlKCfzRn63BlbUsVpofp4IvAIjKHBzS60/qvLZs88r3S4dU/iZEsspNtrmqYAYUglsZnXJ5EX0/RJ3Xz0go6h0mntS/X4msIwEAEQZsIuUGRu+HwX45p+0dPdHy74RTqPaAJOggj9VWhd9Wcny6V+UxV1YtIM63hPV90K9rHLCTq64NUqwL7+6bEePVNx5HGakIx6eWOClXP7E/i4iYbmIPONFs5oTlHdtSXd0auG5LnhM4/E428ZR4bBDDF5suqCXQxhGCzhmD590tkRugyN9Pr1srZZt3F1t9Uy2KBcy+U6fA6EqluqXky3NY8nFrv8/KE6temGuGW+XYbnfoBz6p8YSbTssxxZFJO+G/X8iJiWQZGnU8vndXIM1MU21T7+B1+A4nTDCWtlxA1jzBvOs/BUppq0Yep0eWU+XxYZmKYDneYAOYNmSN4HUpUY14tnQxyrak/i6q/50Yx9QVmurFjc1R4kDcAZWg9AGiP8od8lPbfQtSlHJtviK4+HyI3EuGkuD2NhptDYF5N48ArOLMqak+S9p9UlFxm+V6/QSq0H5oyvjW/peLJqlGrtFrHlhsttfT/Y5gqZBl8NaLG1vNJm0+F2ypnlGXEFbZ0FPh+drHSH2iQLWNjdMemlFJ438yJYMmKN4u7tlOjTyiAI8NFoYW0qaplvHJv7y5B1U9DWTcSpRyXICk+60NPPww6K+FeITckNyEyXIyagVN4GmCkedsF3sWTRzlaqCStSODgsKDSsRLhJl2WEjNneBcKydzj0rAVMcGlpHeAcDcawVjavXZM0XDpMiSeRNPgvM9oe0uBB2HLwXnsuCSfJly0Kg16GsDxXM+KhjefySsmCkmiMv2bjrdBfT9yoKlMgwb3g7jlCqtNPhFX2c8b91ceV4YGicwuBOkmxkaGFMlT4YcsWzqXHp4p+AOOwLwM4dm3I3E/NWYR46GY541cNtX5FpaIkwUSSb+AU3OTqPSHX0WkTqD8V6rHrMT0yvvqmNhqFtV9nFcW4c6k+R7syHcuh6qrm07xpPtPpmjBqcaYanxkC4bldGvvZjpEjQR4LOemt03aKMtC26btX8q+INvHXwQQLkk+J1t5onpo3aY16DHafPH7BcO3tWZgQDdpABuDbveSGb9m6oTml7KW1q12vg/gIYym4WO/yGidjafKLWBxk7TAU6pGhRuKZZasv+ylMPq5nXyi06TzVbNwkkZ/2i9uPauLOyo4UPa5oIEuzEeMH0tCoyXNWYOfHJOMoq6VAuIYLulpDQ5rcwiRcf1awYi9/RDW0Thm4zu3T/nRBp06pcYaY0hsDT+rTzRt40km+fiX3LEopN8/H/A3w9j21SH0gGkSYM69RqVYxxikptOSGbMcsSnJt1wvBdFVsDJGmnLkPIz6I56+L2qPHqKz/AGg0ko2uHZt9P62V3DqFJd8IvafWwmmm+IpW/iK1Qrqdovdq0TsS1SEhPJBT8TpjUNMqQFq41aAcbYvW4jCNwS5YSxA/4ihqJPsyLiMQQ5wOoJBQf1cXG0xikpJNdMn160rI1OocnSOSSB1K5dqeiz65s5JI9bWMggwQglFPshpPsp8IovqvsAYuZMSq2WoqvUqavURwwptpvqi8KT2kANIvadj47hZ8tvNmStVGScpO3X4meKY00y0Amd5Gvguw4lNN+B2gx+2jJy68L0Au4uXAgck32LT5Zaeji5JvwIurgmTdMUPCGzi0mo8FGgKjgA093UXhHgUHljGbpWV4xxtpyXIrxqnmAJkx93lAuei9Nr9PcIyg7XhfCvyNGKSXBz1eg5urSJgi2x0usmUHCt3lEqS8s8qYN4EkW+SUskW6TAjqISdJjXCcaKbXAzzaNp5n0CDNj3tCNVgeVqvqzPEMUHSG+7Y31B3j0XYobe+wtNgcKcuxBOLhV4XiH0wHAECSJjXcjqkZYpvvkq5ljyNxb5o6uhxNj2agGIIVKSa4aMfNp8mNrbbVmKvFmtAYS4ktHe1AAMho+uijZKS4Ajo55N04pd9BcPXdUIiGiBa3ibJaxL6oGWlhijb5d/z5h8I5jHFoJMmS7c32PMrnnltrpfACGTLLjwvQq0K1IQMvnPqkvCpcxY7Jp/aq5clB7WkBzJIJg/0zvEhOwzlB8ropLTvFNOLolYjVemxqoq3Z6HHBxjTbb9WT8Q1MaHKyc5t0eN0xqYQ0zC1sMuAbohcRzDQJOqyNK0SsivkRmp+FZf8AVyJ9tD1PfaLAvw9d9N5zffDvxB0kFUsGdzgmhemzLJjTSprhr0omGoidvsfYI1V1HWP4bh7zBc0hvMa9DCXOSiivPUwXCfIZgdSOaTyBCQ6yKgJVmW077B8RY5oAGo9FkPH7zUujBy6FY3crdP8AH/Qtxik00HTEhzY5iSAfgU/FUXSLWlkseW4qrTOfc0tlgAJMeYKanupstvKslZG2kr4+InxCWmCe8TtonY0n10WNPNZE6XC9exkYstAE7Jfsk3ZPs023R9Sx/f71wTEDfwXotPrduJQT5rz19R7TUOO68msXQc4nLLQR3m856bLH1GoUpe9FJ34fDfrRS9vCkslWnxQtUBYw9pm905WxIjYnlfzSYtSl7vryDGp5Pcqr5ZGg67TE7eqtmm2lx5Gvs0xFzF/z8kvfVlb21N2uC/guGMY0BzWF7hJc8AgW90T4Ktlyvw/wMvNqp5Jva2kvC/UBxAvLmnR0R6SJnQ/oox7aflDdOsai12v46E3w0MAMm+Y7bQAeaYrdtqvQtwcp7typePUr0uG9p3i6CN+h0gbqo82zhIzP6t4fdirs3TwlRhBN2yWyOQ5jqF0pRa4CyajHODS4fD/jHqNDcEQOt7qtKXHKKccjTSrl/gaNfYEkjaL9VyUl8C6p5INb0kn5Q7w7j4p7ZnaAAwCTpJ2T47/Ks7LD/wAq4/UNVk35ifVegxOTim+zTwu4JvsF2U6qwk32E2kDOECbGBykeGnsr2O0iG/Iu7BA3VLWZkkypmyUL9iPwj0WD/UP1Mz26J3t1g6lR7HtYXRTdmjYNdv6qv8AZs0oNN+TS0ufHCc4ylVtV9Uc7R4NVc5rSIBbnnYNPNaXtI1wW5azGotp3Tr6iFdoDiAZAMA80fZYi24ptUxzhvEzTMOGZsRE6eCTlw71xwxGfTLIuOGN4mqHNmbzptCTGLi6OwwcJU1xXZvBYwt3QZMSkNnjUlTVoqUsX3S51xy/NVpY+Uo8FHLp90lGD215/YfBztBDGglsTySUnFtW2Unp3jk05NpO6IfE8G5rsxM7jxV3FNNVVF/T6mDjtSpitJ5c6/6JySXRcSSXBrtshmbg2UummiZRU4uL6Y9R404g90cgAqs9MrTM5/Z8ItPd16jLMHWLe8Dle3uuM5TN9TvdDKUI014ETy4E049p8ryJU8C5rS0lkG+us9ITJZU2nyOnqIzkpU7Eg0082ukTsOSdanRauOWn9S9w3ijDDnMD3CwB0HWNFWnBxv4lDUaKdtY3tT7KtevQeSND90kW35gCNLEhVVHIvNozoYNRBXVpd/l/OEyXmNUkGCynoGjK0kamOV7BP+4rXb9S/wAYYp8qUvL5aXp8y3Qwbn026W3m+2vqfiqfLk6MrJkUMj9D3iVA06RcY7pFtgDa+2p+KPHBsnD7+Sknycx/FHMqZhcbhW/YKcafZ6DHpITw7ZIebjhWLi49jMQRJJtBAtHJTjwY4v33fwSK60kcFJy3JeBzheBogEjM4zMuibco2Wppcem1D2W0/j2Olkhm92+Sv9oC2v6LaqXgeouKoy7EBIcXF0yasG+uui+QlEFqVbuo2DN0igcNDJK8p9qapptI89rZTlLjoQyhYm+XqVPeKmQu92bzJOn7JMJOLos59NKT3Xz6EriHDqmVzGNBzNMO6REf4WlhyPelJ8E4kotTk3w+j8vr0Sxxa4EEGCN7LdTTVnqoyUoqSfDN4ZpmIsRdQ3SCHBThv1okPl2RXNjNDCEjPNuXnoUqWRJ7a5K2TVKL21yWMPhQ7u/d1BOgtoqcsjXPkzp6ucaflfmL08U5hLcwIaYTXBNWuLNBwjkipNU2C4lii5o5yixRpuxOHTpTfoIYiRB22KfCuV5LOBrmL7Q1ToOcW2nMbvDTa1x4xeFDmopv0InmjCL55S6v8DtcHg6WFblY1rnj36uUFxOhgmcjdgB5ySquXNKSvwU97zv3nS9P52P0OLO0JzNNiHXkb+SpOSbIy6RVwifjfZpubtqTzDwRlffKRsH6hu2hOl0z+oaSg1+H+PUpzyzhFQcbSfjj8vL/AAOT49SqAlpEARmAuJ1Hwj1V3TuFJ3foXdBLFSad31f89SU6i5mtjtvIJVlSUjRjkhPrkPSa55jN+QhLbjFXQvJkjBW0PYPEik6AbHVJnFzV+RMsXt4W1ydRwviBa0ZCCNevmdVTlDlozs+NN7Zqv0B8arkUqs+9VIgAaMaWuJM6CwHmU3GkmKwRjvTXS459TjzSl2kq4nSo2VN7KR0GDoPDO63L3YdN56x6pGbBKDjKatSfFGZncYzTy82+K4r4BatYU25ZgjUdF6vQyjBJ1FpriSST+TXqaOnqT3KKafTAMx87rXjkjNF9xTXJQovkSq2TFGTKzVPgZo05KVOEccX6icuVQTbYzUpAXWXk18Y2mzMevT7PBinaHSF5XXz35LXQrJqMa5XIGVSF/wBTEXdxp05YJA5WCetPXvWbc9Inbso0cW4tB8beiByabSfJlzljjuT8NHG8R4c+tiq1Qd0Ae8RIJAFlsYc8YYopvks4tVDFggny2+vhYji8BUbIABDRJebCYkjxT4zi32XMWsg0r7fgSfWMDayIuJ2XOF8Sa+GOpguIi26oZ8Ml7yfBkajRyj70Zcd8l9+Hc+ARlbA5TbRVUnd9szF7quL3O/oc3xjhhousczTv16q9iyqdryjc0esWdNNU14EsQ45QmQXI5RVuwYJb3SJtMHY7o6T5sW6l71/h5LFN2Sm452kmIAccv7/oqs1umlRSS35F7r4+HJ1tDFNY8lznXuA2O9N9T5KtNbo0VYRnNtJLh+fAzin0yLOEkAgCJ8/8qnHFJTVdFuE80aTVrph+GGabxMRDgeRFpv0KdnVJPyI1E6bdX8DiePYv/UcDB7rY8hdXNPjexNDdHgvGpR45f6i9XAtfSDmTH9XnMctD6IllcZ1IKOpljytTSv4CuGweU95xZeBI7s8tRdNlk3LhWOyZ/aKorcvzFsZTc1/eMydRofD9EyDTXBb004SglHivHkZwjnNEyR5pU0m6IyuDfKtliiXhry4ucCIzNM/EmyrOnKNfmZGWUZziopJp9MnPytyhw0uOq3tPi088VN833+xs44pp0+zdTjBGhhWpf0+ONVfzJemg1TVoz2z8S5gFMuyluctvLS4C4Hms2WbZe10vAhqOljKpVd7U/WijX9njnOR2UF2hBIa0tBF9+8SEWD7YWNe9zRSxfbFQW+Nuu/V3/jk6bhfBBkzZoERBuSR8r/mquX7cnkXHDTvj8ijk1WfOm1xzxQQUYgCJ2G+pGg6gqovtKcpybfMuCi55lJuabb4HnYFjGA1LvOomwPK3JLj71uTsu4dApJOV36AXmnvTb6fI6qXGLfKLy0eOqSBxR/B/5O//AEg9hj9P1F//AB8PQ45mpUy6NvL906BnuN81Qf3meYz/AP6fT9RBulTxerL7iKl3H6EjjX/TP8T+Suaf+6X9L/yInOcvJXvJuxKHAP57fP5FIz/22J1f9lna0dvAKpHo8/g6ZL4/7o/uQYf7kh+g/vS+TOdx3u+avY+zVx/f+iFsR77fBMh91nY/uMfxn8ul/b+QSo/fYGm/uzL2H92n/wBofmqvn6sVLuXzGme9/s/NR5D/APH6lLCfyann/wAVXydoz8/k4f2l/nLS0v8AbXyNP7N/46KPDf5A/tf/AMlXz/fXz/wZuq/5D+aM8X/lnxp/NijTff8Ax/cnR/3Po/0ZLxP8ln9x+StY/vy+Rf0396XyC0/dPn8kEuxz+8i9/wCxV8P+IVVf3F/PJgP/AJEPn+5z2P0H9hWrpuj0en6+priPvVP7KfyajmDh6j82O+xv8x/9o/8AsFn63+2Uvtj7kPn+x1zvyHyKy/D+h5/N4+b/AFD4b3T9bhLx/eNPR/2l/PIbC/8AUN/7Q/NGv5+Q+X3X8w3EdB4u+ZWjHosw8ClbQrixDsUUhn//2Q==" alt="Loving the Ocean" class="w-full h-full object-cover" width="930" height="700" />
          <p class="absolute bottom-2 left-4 text-xs text-white z-10">
            Sumber gambar: <a href="https://www.google.com/imgres?q=Acropora%20Formosa%20estetik&imgurl=https%3A%2F%2Fzeeaquarium-winkel.nl%2Fcontent%2FProducts%2Facropora-formosa-groen-frag.jpg&imgrefurl=https%3A%2F%2Freef-aquarium-store.com%2Facropora-formosa-groen-frag&docid=YynH-KlXBNIIVM&tbnid=qmGVM4no0Fpn4M&vet=12ahUKEwiY7IiW9rSOAxUkwzgGHU4pE0AQM3oECFEQAA..i&w=450&h=450&hcb=2&ved=2ahUKEwiY7IiW9rSOAxUkwzgGHU4pE0AQM3oECFEQAA" target="_blank" class="underline hover:text-blue-300">reef-aquarium-store.com</a>
          </p>
        </figure>
        <div class="p-10 text-white">
          <h3 class="text-2xl md:text-3xl font-bold mb-4">1. Acropora Formosa : Sang Arsitek Pionir</h3>
          <p class="text-xl leading-relaxed">
            Di antara hutan karang, Acropora formosa berdiri tegak dengan cabangnya yang menyerupai tanduk rusa nan anggun. Karang ini adalah pelari cepat di dasar laut, tumbuh sangat pesat dan menjadi pionir dalam membentuk struktur terumbu karang baru. Kecepatannya dalam membangun rumah baru bagi kehidupan laut memang luar biasa, namun kecantikannya juga rentan. Ia mudah terpengaruh oleh suhu tinggi, menjadikannya indikator sensitif bagi kesehatan laut. Anda dapat menjumpai keindahannya yang melimpah di surga bawah laut seperti Raja Ampat, Wakatobi, dan Alor, di mana ia diperkirakan mencakup lebih dari 15% koloni Acropora.
          </p>
        </div>
      </div>

      <!-- Jenis Karang 2 -->
      <div class="relative grid md:grid-cols-[41%_auto] grid-cols-1 gap-6 items-center overflow-hidden shadow-xl rounded-lg bg-gradient-to-r from-green-400 to-lime-300 mb-14">
        <figure class="w-full h-full">
          <img src="img/karang2.jpeg" alt="Finding Our Sea Legs" class="w-full h-full object-cover" width="930" height="700" />
          <p class="absolute bottom-2 left-4 text-xs text-white z-10">
            Sumber gambar: <a href="https://www.google.com/imgres?q=Porites%20Lutea%20&imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fthumb%2F9%2F96%2FPorites_lutea.jpg%2F960px-Porites_lutea.jpg&imgrefurl=https%3A%2F%2Ftranslate.google.com%2Ftranslate%3Fu%3Dhttps%3A%2F%2Fen.wikipedia.org%2Fwiki%2FPorites_lutea%26hl%3Did%26sl%3Den%26tl%3Did%26client%3Dimgs&docid=mS4lf6YkNngtDM&tbnid=yybXMUFs53y7BM&vet=12ahUKEwiajayz97SOAxX8yzgGHRiTAWQQM3oECBkQAA..i&w=960&h=720&hcb=2&itg=1&ved=2ahUKEwiajayz97SOAxX8yzgGHRiTAWQQM3oECBkQAA" target="_blank" class="underline hover:text-blue-300">wikipedia.org</a>
          </p>
        </figure>
        <div class="p-10 text-white">
          <h3 class="text-2xl md:text-3xl font-bold mb-4">2. Porites Lutea: Saksi Bisu Jejak Waktu</h3>
          <p class="text-xl leading-relaxed">
            Bayangkan sebuah kubah raksasa yang terbuat dari karang, kokoh dan penuh sejarah. Itulah Porites lutea. Bentuknya yang kubah besar (massive) dengan permukaan kasar menunjukkan ketahanannya yang luar biasa terhadap kerasnya lautan. Keunikan karang ini terletak pada umurnya yang bisa mencapai ratusan tahun, menjadikannya saksi bisu yang merekam jejak iklim laut selama berabad-abad. Populasinya sangat melimpah dan stabil, sekitar 10% karang massif di Indonesia, dan Anda dapat menemukannya menghiasi perairan Karimunjawa, Bali, dan Halmahera.
          </p>
        </div>
      </div>

      <!-- Jenis Karang 3 -->
      <div class="relative grid md:grid-cols-[41%_auto] grid-cols-1 gap-6 items-center overflow-hidden shadow-xl rounded-lg bg-gradient-to-r from-rose-400 to-red-300 mb-14">
        <figure class="w-full h-full">
          <img src="img/karang3.jpeg" alt="Leading with Hope" class="w-full h-full object-cover" width="930" height="700" />
          <p class="absolute bottom-2 left-4 text-xs text-white z-10">
            Sumber gambar: <a href="https://www.google.com/imgres?q=Fungia%20Fungites%20&imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2Fd%2Fdc%2FFungiafungites.jpg&imgrefurl=https%3A%2F%2Ftranslate.google.com%2Ftranslate%3Fu%3Dhttps%3A%2F%2Fen.wikipedia.org%2Fwiki%2FFungia%26hl%3Did%26sl%3Den%26tl%3Did%26client%3Dimgs&docid=JqOOrQS6Hlmz7M&tbnid=IrnxcG8a-PNFIM&vet=12ahUKEwiVyoSz-LSOAxX94zgGHZ7bFCMQM3oECHsQAA..i&w=3070&h=2282&hcb=2&itg=1&ved=2ahUKEwiVyoSz-LSOAxX94zgGHZ7bFCMQM3oECHsQAA" target="_blank" class="underline hover:text-blue-300">wikipedia.org</a>
          </p>
        </figure>
        <div class="p-10 text-white">
          <h3 class="text-2xl md:text-3xl font-bold mb-4">3. Fungia Fungites : Sang Penjelajah Soliter</h3>
          <p class="text-xl leading-relaxed">
            Tidak semua karang hidup berkelompok. Fungia fungites, dengan bentuk piringan soliter yang unik, adalah salah satu dari sedikit karang yang dapat bergerak sendiri di dasar laut. Tanpa terikat pada koloni, ia bebas menjelajahi hamparan pasir di perairan dangkal, menawarkan pemandangan yang berbeda dari karang pada umumnya. Anda bisa menemukan penjelajah individu ini di perairan indah Bunaken, Derawan, dan Teluk Tomini, di mana populasinya cukup umum.
          </p>
        </div>
      </div>

      <!-- Jenis Karang 4 -->
      <div class="relative grid md:grid-cols-[41%_auto] grid-cols-1 gap-6 items-center overflow-hidden shadow-xl rounded-lg bg-gradient-to-r from-rose-500 to-blue-900 mb-14">
        <figure class="w-full h-full">
          <img src="img/karang4.jpeg" alt="Leading the Way" class="w-full h-full object-cover" width="930" height="700" />
          <p class="absolute bottom-2 left-4 text-xs text-white z-10">
            Sumber gambar: <a href="https://www.google.com/imgres?q=Pocillopora%20Damicornis&imgurl=https%3A%2F%2Fmedia.istockphoto.com%2Fid%2F1333638431%2Fid%2Ffoto%2Fpocillopora-damicornis-pink-colorful-sps-coral-di-red-sea-pemandangan-bawah-laut.jpg%3Fs%3D170667a%26w%3D0%26k%3D20%26c%3DjoXxcgeh7g3lTJAv1kf-tTct7ziRQNI0aVlYE10AoK4%3D&imgrefurl=https%3A%2F%2Fwww.istockphoto.com%2Fid%2Ffoto%2Fpocillopora-damicornis-pink-colorful-sps-coral-di-red-sea-pemandangan-bawah-laut-gm1333638431-416066114&docid=aahoAG7kx4-pwM&tbnid=OxvEfFRT7tlE7M&vet=12ahUKEwjhpsLc-LSOAxWNoWMGHWlmN5IQM3oECBoQAA..i&w=508&h=339&hcb=2&ved=2ahUKEwjhpsLc-LSOAxWNoWMGHWlmN5IQM3oECBoQAA" target="_blank" class="underline hover:text-blue-300">istockphoto.com/</a>
          </p>
        </figure>
        <div class="p-10 text-white">
          <h3 class="text-2xl md:text-3xl font-bold mb-4">4. Pocillopora Damicornis : Kameleon Laut yang Cepat Beradaptasi</h3>
          <p class="text-xl leading-relaxed">
            Dengan cabang-cabang kecilnya yang rapat, Pocillopora damicornis adalah spesies karang yang dinamis dan adaptif. Keunikan utamanya adalah kemampuannya mudah berubah warna dan cepat bereproduksi, menjadikannya salah satu spesies dominan di zona reef crest. Tak heran jika karang ini digunakan dalam banyak studi ilmiah tentang pemutihan karang, memberikan wawasan penting bagi para peneliti. Populasinya melimpah di perairan seperti Kepulauan Seribu, Nusa Penida, dan Biak, berkat kemampuannya yang luar biasa dalam berkembang biak.
          </p>
        </div>
      </div>

      <!-- Jenis Karang 5 -->
      <div class="relative grid md:grid-cols-[41%_auto] grid-cols-1 gap-6 items-center overflow-hidden shadow-xl rounded-lg bg-[linear-gradient(90deg,_rgb(167,65,109)_0%,_rgb(11,99,154)_100%)] mb-14">
        <figure class="w-full h-full relative">
          <img src="img/karang5.jpeg" alt="Montipora digitata" class="w-full h-full object-cover" width="930" height="700" />
          <p class="absolute bottom-2 left-4 text-xs text-white z-10">
            Sumber gambar: <a href="https://www.google.com/imgres?q=Montipora%20digitata&imgurl=https%3A%2F%2Freefbuilders.com%2Fwp-content%2Fblogs.dir%2F1%2Ffiles%2F2020%2F06%2Fdigitata4.jpg&imgrefurl=https%3A%2F%2Ftranslate.google.com%2Ftranslate%3Fu%3Dhttps%3A%2F%2Freefbuilders.com%2F2015%2F03%2F11%2Fso-much-to-dig-about-montipora-digitata%2F%26hl%3Did%26sl%3Den%26tl%3Did%26client%3Dimgs&docid=ykGL6Jlyrq93dM&tbnid=IyS_cPcrcWgbFM&vet=12ahUKEwiz8bST-bSOAxX-wTgGHV5QHQMQM3oECGcQAA..i&w=600&h=403&hcb=2&itg=1&ved=2ahUKEwiz8bST-bSOAxX-wTgGHV5QHQMQM3oECGcQAA" target="_blank" class="underline hover:text-blue-300">reefbuilders-com/</a>
          </p>
        </figure>
        <div class="p-10 text-white">
          <h3 class="text-2xl md:text-3xl font-bold mb-4">5. Montipora digitata : Jari-Jari Berwarna di Bawah Samud</h3>
          <p class="text-xl leading-relaxed">
            Cantik dan memukau, Montipora digitata menampilkan cabang-cabang halus yang menyerupai jari-jari nan elegan. Karang ini dikenal dengan warnanya yang mencolok dan kesukaannya pada cahaya terang, menjadikannya pemandangan yang menakjubkan di perairan jernih. Tak hanya indah di alam liar, Montipora digitata juga banyak digunakan dalam konservasi akuarium laut, membantu menjaga keindahan terumbu karang buatan. Anda dapat menemukan populasi tinggi karang ini di perairan sebening kristal di Wakatobi, Komodo, dan Bali.
          </p>
        </div>
      </div>

    </div>
  </section>

  <!-- Penutup -->
  <div class="max-w-7xl mx-auto px-4 mt-10">
    <div class="text-center text-xl font-semibold text-blue-600 bg-blue-50 border border-blue-200 rounded-lg p-6 shadow">
      Setiap jenis terumbu karang adalah benang dalam permadani kehidupan bawah laut Indonesia yang kaya. Keunikan bentuk, ciri khas, dan peran ekologisnya membentuk sebuah ekosistem yang rapuh namun vital. Melalui pemahaman dan apresiasi terhadap keajaiban-keajaiban ini, mari kita bersama-sama menjadi pelindung bagi permata bawah laut kita, memastikan bahwa generasi mendatang juga dapat menikmati keindahan tak terhingga dari terumbu karang Indonesia.
    </div>
  </div>

  <!-- Footer -->
  <?php include "_layout_footer.php" ?>

</body>

</html>