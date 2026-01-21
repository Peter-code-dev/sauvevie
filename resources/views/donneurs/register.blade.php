<form method="POST" action="/api/donors">
    @csrf
    <input name="name" placeholder="Nom complet" required>
    <input name="phone" placeholder="Téléphone" required>
    <input name="blood_group" placeholder="Groupe sanguin" required>
    <input name="city" placeholder="Ville" required>
    <button type="submit">S'inscrire</button>
</form>
