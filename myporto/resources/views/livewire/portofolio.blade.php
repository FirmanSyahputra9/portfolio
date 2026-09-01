<div
    class=" max-w-screen md:max-w-[calc(100%-4rem)] lg:max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex flex-col lg:flex-row gap-8 py-6 lg:py-10">
    <x-sidebar :contacts="$contacts" :hero="$hero" />
    <main class="flex-1 min-w-0 space-y-20 pb-10 lg:pb-6 main-scroll">
        <x-section.hero :hero="$hero" />

        <x-section.about :technologies="$technologies" :about="$about" />

        <x-section.educations :educations="$educations" :showAllEducations="$showAllEducations" />

        <x-section.experience :experiences="$experiences" :showAllExperiences="$showAllExperiences" />

        <x-section.projects :projects="$projects" :featuredProject="$featuredProject" />

        <x-section.skills :skills="$skills" />
        <x-section.certificate :certificates="$certificates" :showAllCertificates="$showAllCertificates" />
        <x-section.contact :contacts="$contacts" />


    </main>
</div>
