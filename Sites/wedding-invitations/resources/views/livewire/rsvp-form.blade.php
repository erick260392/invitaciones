
    <div>
        <form wire:submit.prevent="submit">
            <input type="text" wire:model="name" placeholder="Nombre completo">
            <select wire:model="attending">
                <option value="1">Asistiré</option>
                <option value="0">No podré asistir</option>
            </select>
            <button type="submit">Enviar</button>
        </form>
    </div>

