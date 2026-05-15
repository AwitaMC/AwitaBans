<?php

#[AllowDynamicProperties]
class gr_GR {
    public function __construct() {
        $this->version = 2;
        $array = array();
        $this->array = &$array;

        $array["index.welcome.main"] = "Καλωσήρθατε στην λίστα ban του {server}";
        $array["index.welcome.sub"] = "Εδώ είναι που αναφέρονται όλα τα punishment μας.";

        $array["title.index"] = 'Αρχική Σελίδα';
        $array["title.bans"] = 'Bans';
        $array["title.mutes"] = 'Σιγάσεις';
        $array["title.warnings"] = 'Προειδοποιήσεις';
        $array["title.kicks"] = 'Kicks';
        $array["title.player-history"] = "Πρόσφατα Punishment για τον {name}";
        $array["title.staff-history"] = "Πρόσφατα Punishment από τον {name}";


        $array["generic.ban"] = "Απαγόρευση (Βan)";
        $array["generic.mute"] = "Σίγαση";
        $array["generic.warn"] = "Προειδοποίηση";
        $array["generic.kick"] = "Kick";

        $array["generic.unban"] = "Σήκωσε την απαγόρευση (Unban)";
        $array["generic.unmute"] = "Σήκωσε την σίγαση";

        $array["generic.banned"] = "Banned";
        $array["generic.muted"] = "Σιγασμένος";
        $array["generic.warned"] = "Προειδοποιημένος";
        $array["generic.kicked"] = "Kicked";

        $array["generic.unbanned"] = "Unbanned";
        $array["generic.unmuted"] = "Unmuted";

        $array["generic.banned.by"] = $array["generic.banned"] . " από τον";
        $array["generic.muted.by"] = $array["generic.muted"] . " από τον";
        $array["generic.warned.by"] = $array["generic.warned"] . " από τον";
        $array["generic.kicked.by"] = $array["generic.kicked"] . " από τον";

        $array["generic.ipban"] = "IP " . $array["generic.ban"];
        $array["generic.ipmute"] = "IP " . $array["generic.mute"];

        $array["generic.permanent"] = "Μόνιμο";
        $array["generic.permanent.ban"] = $array['generic.permanent'] . ' ' . $array["generic.ban"];
        $array["generic.permanent.mute"] = $array['generic.permanent'] . ' ' . $array["generic.mute"];

        $array["generic.type"] = "Τύπος";
        $array["generic.active"] = "Ενεργό";
        $array["generic.inactive"] = "Ανένεργο";
        $array["generic.expired"] = "Ληγμένο";
        $array["generic.expired.kick"] = "N/A";
        $array["generic.player-name"] = "Παίχτης";

        $array["page.expired.ban"] = '(' . $array["generic.unbanned"] . ')';
        $array["page.expired.ban-by"] = '(' . $array["generic.unbanned"] . ' από τον {name})';
        $array["page.expired.mute"] = '(' . $array["generic.unmuted"] . ')';
        $array["page.expired.mute-by"] = '(' . $array["generic.unmuted"] . ' από τον {name})';
        $array["page.expired.warning"] = '(' . $array["generic.expired"] . ')';

        $array["table.player"] = $array["generic.player-name"];
        $array["table.type"] = $array["generic.type"];
        $array["table.executor"] = "Moderator";
        $array["table.reason"] = "Λόγος";
        $array["table.reason.unban"] = $array["generic.unban"] . " " . $array["table.reason"];
        $array["table.reason.unmute"] = $array["generic.unmute"] . " " . $array["table.reason"];
        $array["table.date"] = "Ημερομηνία";
        $array["table.expires"] = "Λήγει";
        $array["table.received-warning"] = "Λήφθηκε Προειδοποίηση";


        $array["table.server.name"] = "Σέρβερ";
        $array["table.server.scope"] = "Σκόπιμος Σέρβερ";
        $array["table.server.origin"] = "Αρχικός Σέρβερ";
        $array["table.server.global"] = "*";
        $array["table.pager.number"] = "Σελίδα";

        $array["action.check"] = "Ελεγχος";
        $array["action.return"] = "Επίστρεψε στο {origin}";

        $array["error.missing-args"] = "Λείπουν arguments.";
        $array["error.name.unseen"] = "{name} δεν έχει κάνει join.";
        $array["error.name.invalid"] = "Μη έγκυρο όνομα.";
        $array["history.error.uuid.no-result"] = "Δεν βρέθηκαν punishments";
        $array["info.error.id.no-result"] = "Error: {type} δεν βρέθηκε στη βάση δεδομένων.";
    }
}
