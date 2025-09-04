/*  jQuery Nice Select - v1.0
    https://github.com/hernansartorio/jquery-nice-select
    Made by Hernán Sartorio  */
class NiceSelect {
    constructor(select) {
        this.select = select;
        this.build();
        this.bindEvents();
    }

    build() {
        this.select.style.display = 'none';
        this.wrapper = document.createElement('div');
        this.wrapper.className = `nice-select ${this.select.className}`.trim();
        if (this.select.disabled) {
            this.wrapper.classList.add('disabled');
        }
        this.wrapper.tabIndex = this.select.disabled ? -1 : 0;

        this.current = document.createElement('span');
        this.current.className = 'current';
        this.wrapper.appendChild(this.current);

        this.list = document.createElement('ul');
        this.list.className = 'list';
        this.wrapper.appendChild(this.list);

        this.select.parentNode.insertBefore(this.wrapper, this.select.nextSibling);

        [...this.select.options].forEach(option => {
            const li = document.createElement('li');
            li.className = 'option';
            li.dataset.value = option.value;
            li.dataset.display = option.dataset.display || '';
            li.textContent = option.text;

            if (option.disabled) li.classList.add('disabled');
            if (option.selected) {
                li.classList.add('selected');
                this.current.textContent = option.dataset.display || option.text;
            }

            this.list.appendChild(li);
        });
    }

    bindEvents() {
        this.wrapper.addEventListener('click', e => {
            if (this.wrapper.classList.contains('disabled')) return;
            document.querySelectorAll('.nice-select.open').forEach(el => {
                if (el !== this.wrapper) el.classList.remove('open');
            });
            this.wrapper.classList.toggle('open');
        });

        this.list.addEventListener('click', e => {
            const option = e.target.closest('.option:not(.disabled)');
            if (!option) return;

            this.list.querySelector('.selected')?.classList.remove('selected');
            option.classList.add('selected');

            this.current.textContent = option.dataset.display || option.textContent;
            this.select.value = option.dataset.value;
            this.select.dispatchEvent(new Event('change'));

            this.wrapper.classList.remove('open');
        });

        document.addEventListener('click', e => {
            if (!this.wrapper.contains(e.target)) {
                this.wrapper.classList.remove('open');
            }
        });

        this.wrapper.addEventListener('keydown', e => {
            const isOpen = this.wrapper.classList.contains('open');
            const options = [...this.list.querySelectorAll('.option:not(.disabled)')];
            let focused = this.list.querySelector('.focus') || this.list.querySelector('.selected');
            let idx = options.indexOf(focused);

            switch (e.key) {
                case ' ':
                case 'Enter':
                    e.preventDefault();
                    if (isOpen && focused) focused.click();
                    else this.wrapper.click();
                    break;
                case 'ArrowDown':
                    e.preventDefault();
                    if (!isOpen) this.wrapper.click();
                    else if (idx < options.length - 1) this.setFocus(options[idx + 1]);
                    break;
                case 'ArrowUp':
                    e.preventDefault();
                    if (!isOpen) this.wrapper.click();
                    else if (idx > 0) this.setFocus(options[idx - 1]);
                    break;
                case 'Escape':
                    this.wrapper.classList.remove('open');
                    break;
                case 'Tab':
                    if (isOpen) {
                        e.preventDefault();
                        this.wrapper.classList.remove('open');
                    }
                    break;
            }
        });
    }

    setFocus(option) {
        this.list.querySelector('.focus')?.classList.remove('focus');
        option.classList.add('focus');
        option.scrollIntoView({ block: 'nearest' });
    }

    static initAll() {
        document.querySelectorAll('select').forEach(select => {
            if (!select.nextElementSibling?.classList?.contains('nice-select')) {
                new NiceSelect(select);
            }
        });
    }
}

// Initialize after DOM load
document.addEventListener('DOMContentLoaded', () => {
    NiceSelect.initAll();
});
