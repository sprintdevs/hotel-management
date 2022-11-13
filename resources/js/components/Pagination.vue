<template>
    <ul class="inline-flex -space-x-px">
        <li class="py-2 px-3 ml-0 leading-tight text-white bg-cyan-700 rounded-l-lg border border-gray-300 hover:bg-gray-600 hover:text-white-700">
            <button type="button" @click="onClickFirstPage" :disabled="isInFirstPage">First</button>
        </li>

        <li class="py-2 px-3 leading-tight text-white bg-cyan-700 border border-gray-300 hover:bg-gray-600 hover:text-white-700">
            <button type="button" @click="onClickPreviousPage" :disabled="isInFirstPage">Previous</button>
        </li>

        <li v-for="page in pages" :key="page.name" class="py-2 px-3 leading-tight text-white bg-cyan-700 border border-gray-300 hover:bg-gray-600 hover:text-white-700">
            <button type="button" @click="onClickPage(page.name)" :disabled="page.isDisabled">
                {{ page.name }}
            </button>
        </li>

        <li class="py-2 px-3 leading-tight text-white bg-cyan-700 border border-gray-300 hover:bg-gray-600 hover:text-white-700">
            <button type="button" @click="onClickNextPage" :disabled="isInLastPage">Next</button>
        </li>

        <li class="py-2 px-3 leading-tight text-white bg-cyan-700 rounded-r-lg border border-gray-300 hover:bg-gray-600 hover:text-white-700">
            <button type="button" @click="onClickLastPage" :disabled="isInLastPage">Last</button>
        </li>
    </ul>
</template>

<script>
export default {
    props: {
        maxVisibleButtons: {
            type: Number,
            required: false,
            default: 3
        },
        totalPages: {
            type: Number,
            required: true
        },
        perPage: {
            type: Number,
            required: true
        },
        currentPage: {
            type: Number,
            required: true
        }
    },

    computed: {
        startPage() {
            if (this.currentPage === 1) {
                return 1
            }

            if (this.currentPage === this.totalPages) {
                return this.totalPages - this.maxVisibleButtons
            }

            return this.currentPage - 1
        },
        isInFirstPage() {
            return this.currentPage === 1
        },
        isInLastPage() {
            return this.currentPage === this.totalPages
        },
        pages() {
            const range = []

            for (let i = this.startPage; i <= Math.min(this.startPage + this.maxVisibleButtons - 1, this.totalPages); i++) {
                range.push({
                    name: i,
                    isDisabled: i === this.currentPage
                })
            }

            return range
        }
    },
    methods: {
        onClickFirstPage() {
            this.$emit('pagechanged', 1)
        },
        onClickPreviousPage() {
            this.$emit('pagechanged', this.currentPage - 1)
        },
        onClickPage(page) {
            this.$emit('pagechanged', page)
        },
        onClickNextPage() {
            this.$emit('pagechanged', this.currentPage + 1)
        },
        onClickLastPage() {
            this.$emit('pagechanged', this.totalPages)
        }
    }
}
</script>
